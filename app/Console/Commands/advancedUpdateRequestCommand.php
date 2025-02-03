<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class advancedUpdateRequestCommand extends Command
{
    protected $signature = 'make:module-updateRequest {table} {model}';

    protected $description = 'Create a new Form request';

    public function handle()
    {
        $name = $this->argument('model');
        $table = $this->argument('table');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);
        $modelName = ucfirst($name);

        // Get the table name (assuming it's the plural form of the lowercased model name)
        $table = $plural;

        // Columns to exclude from validation
        $excludedColumns = ['id', 'uuid', 'created_at', 'updated_at', 'deleted_at', 'isactive'];
        $avatarColumns = ['picture', 'logo', 'avatar', 'flag_path', 'image', 'photo'];
        $uniqueColumns = ['email', 'phone', 'website'];

        // Fetch columns and generate validation rules
        $columns = Schema::getColumnListing($table);
        $validationRules = [];

        foreach ($columns as $column) {
            if (in_array($column, $excludedColumns)) {
                continue; // Skip excluded columns
            }

            $columnType = DB::getSchemaBuilder()->getColumnType($table, $column);
            $columnDetails = DB::select("SHOW COLUMNS FROM $table LIKE '$column'")[0];

            $rules = ["'bail'"]; // Add 'bail' rule at the beginning
            if ($columnDetails->Null === 'NO' && $columnDetails->Default === null) {
                $rules[] = "'required'";
            } else {
                $rules[] = "'nullable'";
            }

            // Custom rules for unique columns
            if (in_array($column, $uniqueColumns)) {
                if ($column === 'email') {
                    $rules[] = "'regex:' . RegexEnum::EMAIL";
                    $rules[] = "Rule::unique('$table', '$column')->ignore(\$this->$lowerName)";
                } elseif ($column === 'phone') {
                    $rules[] = "'regex:' . RegexEnum::PHONE";
                    $rules[] = "'min:10'";
                    $rules[] = "'max:15'";
                    $rules[] = "Rule::unique('$table', '$column')->ignore(\$this->$lowerName)";
                } elseif ($column === 'website') {
                    $rules[] = "'regex:' . RegexEnum::WEBSITE";
                    $rules[] = "'min:10'";
                    $rules[] = "'max:15'";
                    $rules[] = "Rule::unique('$table', '$column')->ignore(\$this->$lowerName)";
                } else {
                    $rules[] = "'unique:$table'";
                }
            }

            // Add additional rules based on the column type if necessary
            if (in_array($column, $avatarColumns)) {
                $rules[] = "'image'";
                $rules[] = "'mimes:jpeg,png,jpg,gif,svg'";
                $rules[] = "'max:2048'";
            } else {
                switch ($columnType) {
                    case 'string':
                        $rules[] = "'string'";
                        break;
                    case 'integer':
                        $rules[] = "'integer'";
                        break;
                    case 'boolean':
                        $rules[] = "'boolean'";
                        break;
                    case 'float':
                    case 'double':
                    case 'decimal':
                        $rules[] = "'numeric'";
                        break;
                    case 'date':
                        $rules[] = "'date'";
                        break;
                    case 'datetime':
                    case 'timestamp':
                        $rules[] = "'date_format:Y-m-d H:i:s'";
                        break;
                    case 'time':
                        $rules[] = "'date_format:H:i:s'";
                        break;
                    case 'text':
                    case 'mediumText':
                    case 'longText':
                        $rules[] = "'string'";
                        break;
                    case 'json':
                        $rules[] = "'json'";
                        break;
                    case 'binary':
                        $rules[] = "'file'";
                        break;
                    // Add other types as needed...
                    default:
                        $rules[] = "'string'";
                        break;
                }
            }

            $validationRules[$column] = $rules;
        }

        // Convert the validation rules array to a string format with array syntax
        $validationString = '';
        foreach ($validationRules as $field => $rules) {
            $rulesArray = implode(", ", $rules);
            $validationString .= "'$field' => [$rulesArray],\n";
        }

        // Get the content of the stub file
        $stub = File::get(app_path('Console/Commands/stubs/updateRequest.stub'));

        // Replace placeholders in the stub content
        $stub = str_replace('{{model}}', $name, $stub);
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);
        $stub = str_replace('{{validationRules}}', $validationString, $stub);

        // Define the file path
        $filePath = base_path('Modules/' . $modelName . '/App/Http/Requests/Update' . $name . 'Request.php');

        // Delete the folder
        $directoryPath = base_path('Modules/' . $modelName . '/App/Http/Requests/');
        // File::deleteDirectory($directoryPath);

        // // Create the directory first
        // File::makeDirectory($directoryPath, 0755, true);

        // Check if the file already exists
        if (File::exists($filePath)) {
            $this->error('Form request file already exists!');
            return;
        }

        // Write the stub content to the file
        File::put($filePath, $stub);
        $this->info('Form request file created successfully!');
    }
}
