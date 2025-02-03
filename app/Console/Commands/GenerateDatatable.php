<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class GenerateDatatable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module-datatable {table} {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a datatable for a Module';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $table = $this->argument('table');
        $name = $this->argument('model');
        $className = ucfirst($name) . 'Datatable';
        $modelName = ucfirst($name);
        $lowerName = strtolower($name);
        $avatarColumns = ['picture', 'logo', 'avatar', 'flag_path', 'image', 'photo'];

        // Check if the model file exists
        $stub = File::get(app_path('Console/Commands/stubs/Datatable.stub'));

        // Replace occurrences of the placeholders with the provided model name argument
        $stub = str_replace('{{className}}', $className, $stub);
        $stub = str_replace('{{modelName}}', $modelName, $stub);
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);

        // Generate filter columns and added columns based on the table columns
        [$filterColumns, $addedColumns, $avatarColumnEdit, $hasIsactive] = $this->generateColumns($table, $avatarColumns, $modelName, $lowerName);
        $rawColumns = $hasIsactive ? "['isactive', 'actions', 'checkbox']" : "['actions', 'checkbox']";

        // Replace the placeholders for filter columns, added columns, and avatar columns
        $stub = str_replace('{{filterColumns}}', $filterColumns, $stub);
        $stub = str_replace('{{addedColumns}}', $addedColumns, $stub);
        $stub = str_replace('{{avatarColumnEdit}}', $avatarColumnEdit, $stub);
        $stub = str_replace('{{rawColumns}}', $rawColumns, $stub);
        $rawColumns = $hasIsactive ? "['isactive', 'actions', 'checkbox']" : "['actions', 'checkbox']";
        // Generate a unique Datatable file name
        $filename = $modelName . 'Datatable.php';
        $directoryPath = base_path('Modules/' . $modelName . '/App/Http/Datatable');

        // Delete folder
        File::deleteDirectory($directoryPath);
        // Create folder
        File::makeDirectory($directoryPath, 0755, true);

        // Save the Datatable content in the datatable directory
        $filePath = base_path('Modules/' . $modelName . '/App/Http/Datatable/' . $filename);
        if (File::exists($filePath)) {
            $this->error('Datatable file already exists!');
            return;
        }
        File::put($filePath, $stub);

        $this->info($filename . ' generated successfully inside Module: ' . $modelName);
    }

    private function generateColumns($table, $avatarColumns, $modelName, $lowerName)
    {
        $columns = Schema::getColumnListing($table);
        $filterColumns = '';
        $addedColumns = '';
        $avatarColumnEdit = '';
        $hasIsactive = false;
        foreach ($columns as $column) {
            if ($column === 'isactive') {
                $hasIsactive = true;
                $filterColumns .= <<<EOT
                ->filterColumn('isactive', function(\$query, \$keyword) {
                    if (\$keyword === '0' || \$keyword === '1') {
                        \$query->where('isactive', \$keyword);
                    }
                })
                EOT;

                $addedColumns .= <<<EOT
                ->addColumn('isactive', function (\$object) {
                    return view('components.isactive', ['object' => \$object, 'lowerName' => '{$lowerName}']);
                })
                EOT;
            } elseif (strpos($column, '_id') !== false) {
                $filterColumns .= <<<EOT

                ->filterColumn('{$column}', function(\$query, \$keyword) {
                    \$query->where('{$column}', \$keyword);
                })
                EOT;
            }

            if (in_array($column, $avatarColumns)) {
                $avatarColumnEdit .= <<<EOT

                ->editColumn('{$column}', function ({$modelName} \$object) {
                    return view('{$lowerName}::image', compact('object'));
                })
                EOT;
            }
        }

        return [$filterColumns, $addedColumns, $avatarColumnEdit, $hasIsactive];
    }
}
