<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class advancedFilterCommand extends Command
{
    protected $signature = 'make:filter {table} {model}';

    protected $description = 'Create a new filter blade';

    public function handle()
    {
        $name = $this->argument('model');
        $table = $this->argument('table');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);
        $modelName = ucfirst($name);
        $object = '$object';

        // Get the directory first
        $directoryPath = base_path('Modules/' . $modelName . '/resources/views');

        // Get the content of the stub file
        $stub = File::get(app_path('Console/Commands/stubs/template/filter.stub'));

        // Generate the form content based on table columns
        $columns = Schema::getColumnListing($table);
        $filterContent = $this->generateFilterContent($columns, $lowerName);

        // Replace placeholders in the stub content
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);
        $stub = str_replace('{{model}}', $name, $stub);
        $stub = str_replace('{{modelName}}', $modelName, $stub);
        $stub = str_replace('{{filterContent}}', $filterContent, $stub);

        // Create the Blade view file inside the new directory
        $filePath = "{$directoryPath}/filters.blade.php";
        File::put($filePath, $stub);

        $this->info('Filter blade created successfully!');
    }

    private function generateFilterContent($columns, $lowerName)
    {
        $filterContent = '';

        foreach ($columns as $column) {
            if (strpos($column, '_id') !== false) {
                $option = Str::plural(str_replace('_id', '', $column));
                $filterContent .= <<<EOT

                        <x-single-select cols="col-md-4" div-id="{$column}" column="{$column}" label="{$lowerName}_form_{$column}"
                        optional="text-primary" id="{$column}" :options="{$option}()" :object=false />
                EOT;
            } elseif ($column === 'isactive') {
                $filterContent .= <<<EOT

                        <x-single-select cols="col-md-4" div-id="{$column}" column="{$column}" label="{$lowerName}_form_{$column}"
                        optional="text-primary" id="{$column}" :options="status()" :object=false />
                EOT;
            }
        }

        return <<<EOT

                {$filterContent}

        EOT;
    }
}
