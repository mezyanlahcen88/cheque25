<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class GenerateJsDatatable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module-datatable-js {table} {model}';

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
        $modelName = $this->argument('model');
        $lowerName = strtolower($modelName);
        $plural = Str::plural($lowerName);

        // Check if the stub file exists
        $stub = File::get(app_path('Console/Commands/stubs/template/datatableJs.stub'));

        // Replace placeholders with the provided model name arguments
        $stub = str_replace('{{modelName}}', $modelName, $stub);
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);

        // Generate filter columns based on the table columns
        $columns = Schema::getColumnListing($table);
        $filterColumnsJs = $this->generateFilterColumnsJs($columns);

        // Replace the placeholder for filter columns in JS
        $stub = str_replace('{{filterColumnsJs}}', $filterColumnsJs, $stub);

        // Generate a unique Datatable JS file name
        $filename = $table . '.js';


        // Save the Datatable JS content in the directory
        $filePath = public_path('assets/custom_js/' . $filename);
        if (File::exists($filePath)) {
           File::delete($filePath);
        }
        File::put($filePath, $stub);

        $this->info($filename . ' generated successfully inside Module: ' . $modelName);
    }

    private function generateFilterColumnsJs($columns)
    {
        $filterColumnsJs = '';

        foreach ($columns as $index => $column) {
            if ($column === 'isactive') {
                $filterColumnsJs .= <<<EOT

                $('#isactive').on('change', function() {
                    datatable.column($index).search($(this).val()).draw();
                });
                EOT;
            } elseif (strpos($column, '_id') !== false) {
                $filterColumnsJs .= <<<EOT

                $('#$column').on('change', function() {
                    datatable.column($index).search($(this).val()).draw();
                });
                EOT;
            }
        }

        return $filterColumnsJs;
    }
}
