<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AdvancedModelCommand extends Command
{
    protected $signature = 'make:module-model {table} {model}';

    protected $description = 'Create a new Model class with fillable properties based on a table';

    public function handle()
    {
        $name = $this->argument('model');
        $table = $this->argument('table');
        $className = ucfirst($name);
        $modelName = ucfirst($name);
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);

        // Get columns from the specified table
        $columns = DB::getSchemaBuilder()->getColumnListing($table);

        if (empty($columns)) {
            $this->error("No columns found for table: $table");
            return;
        }

        // Columns to exclude
        $excludedColumns = ['id', 'created_at', 'updated_at', 'deleted_at'];

        // Filter out the columns to exclude from the fillable array
        $filteredColumns = array_diff($columns, $excludedColumns);

        // Generate fillable array string
        $fillableArray = "protected \$fillable = [\n";
        foreach ($filteredColumns as $column) {
            $fillableArray .= "        '$column',\n";
        }
        $fillableArray .= "    ];\n";

        // Generate files array string
        $fileColumns = array_intersect($columns, ['picture', 'logo', 'avatar', 'flag_path', 'image', 'photo']);
        $filesArray = "private \$files = [\n";
        foreach ($fileColumns as $fileColumn) {
            $filesArray .= "        '$fileColumn',\n";
        }
        $filesArray .= "    ];\n";

        // Generate getRowsTable method
        $rowsTableArray = "public function getRowsTable()\n    {\n        return [\n";
        $rowsTableArray .= "            'created_at' => 'created_at',\n";
        foreach ($filteredColumns as $column) {
            $rowsTableArray .= "            '$column' => '$column',\n";
        }
        $rowsTableArray .= "        ];\n    }\n";

        // Generate getRowsTableTrashed method
        $rowsTableTrashedArray = "public function getRowsTableTrashed()\n    {\n        return [\n";
        $rowsTableTrashedArray .= "            'created_at' => 'created_at',\n";

        foreach ($filteredColumns as $column) {
            $rowsTableTrashedArray .= "            '$column' => '$column',\n";
        }
        $rowsTableTrashedArray .= "        ];\n    }\n";

        // Generate relationships
        $relationshipsArray = "";
        foreach ($filteredColumns as $column) {
            if (Str::endsWith($column, '_id')) {
                $relatedModel = ucfirst(Str::camel(str_replace('_id', '', $column)));
                $relatioName = Str::lower($relatedModel);
                $relationshipsArray .= "public function $relatioName()\n    {\n        return \$this->belongsTo({$relatedModel}::class);\n    }\n\n";
            }
        }

        // Generate getColumns method
        $getColumnsMethod = $this->generateGetColumnsMethod($columns, $excludedColumns);

        // Generate getTrashedColumns method
        $getTrashedColumnsMethod = $this->generateGetTrashedColumnsMethod($columns, $excludedColumns);

        // Read and replace stub content
        $stub = File::get(app_path('Console/Commands/stubs/model.stub'));
        $stub = str_replace('{{class}}', $className, $stub);
        $stub = str_replace('{{model}}', $modelName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);
        $stub = str_replace('{{fillable}}', $fillableArray, $stub);
        $stub = str_replace('{{files}}', $filesArray, $stub);
        $stub = str_replace('{{getRowsTable}}', $rowsTableArray, $stub);
        $stub = str_replace('{{getRowsTableTrashed}}', $rowsTableTrashedArray, $stub);
        $stub = str_replace('{{relationships}}', $relationshipsArray, $stub);
        $stub = str_replace('{{getColumns}}', $getColumnsMethod, $stub);
        $stub = str_replace('{{getTrashedColumns}}', $getTrashedColumnsMethod, $stub);

        // Delete folder
        $directoryPath = base_path('Modules/' . $modelName . '/App/Models');
        File::deleteDirectory($directoryPath);

        // Create the directory
        File::makeDirectory($directoryPath, 0755, true);
        $filePath = base_path('Modules/' . $name . '/app/Models/' . $className . '.php');

        if (File::exists($filePath)) {
            $this->error('Model class already exists!');
            return;
        }

        File::put($filePath, $stub);

        $this->info('Model created successfully inside the module!');
    }

    protected function generateGetColumnsMethod($columns, $excludedColumns)
    {
        $columnsArray = [
            ['data' => 'checkbox', 'searchable' => false, 'orderable' => false, 'visible' => true],
            ['data' => 'created_at', 'searchable' => false,'visible' => false],

        ];

        $visibleCount = 0;
        foreach ($columns as $column) {
            if (!in_array($column, $excludedColumns)) {
                // Make the first five columns visible, others invisible
                $visible = $visibleCount < 5 ? true : false;
                $columnsArray[] = ['data' => $column, 'visible' => $visible];
                $visibleCount++;
            }
        }

        // Add the actions column at the end
        $columnsArray[] = ['data' => 'actions'];

        return "public static function getColumns()\n    {\n        return [\n" . $this->arrayToString($columnsArray) . "\n        ];\n    }\n";
    }

    protected function arrayToString($array)
    {
        $result = '';
        foreach ($array as $item) {
            $result .= "            [\n";
            foreach ($item as $key => $value) {
                $result .= "                '$key' => " . (is_bool($value) ? ($value ? 'true' : 'false') : "'$value'") . ",\n";
            }
            $result .= "            ],\n";
        }
        return $result;
    }

    protected function generateGetTrashedColumnsMethod($columns, $excludedColumns)
    {
        $columnsArray = [
            ['data' => 'checkbox', 'searchable' => false, 'orderable' => false, 'visible' => true],
            ['data' => 'created_at', 'searchable' => false,'visible' => false],

        ];

        $visibleCount = 0;
        foreach ($columns as $column) {
            if (!in_array($column, $excludedColumns)) {
                // Make the first five columns visible, others invisible
                $visible = $visibleCount < 5 ? true : false;
                $columnsArray[] = ['data' => $column, 'visible' => $visible];
                $visibleCount++;
            }
        }

        // Add the actions column at the end
        $columnsArray[] = ['data' => 'actions'];

        return "public static function getTrashedColumns()\n    {\n        return [\n" . $this->arrayToString($columnsArray) . "\n        ];\n    }\n";
    }
}
