<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class advancedEditCommand extends Command
{
    protected $signature = 'make:edit {table} {model}';

    protected $description = 'Create a new edit blade';

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
        $stub = File::get(app_path('Console/Commands/stubs/template/edit.stub'));

        // Generate the form content based on table columns
        $columns = Schema::getColumnListing($table);
        $formContent = $this->generateFormContent($table, $columns, $lowerName, $object,$plural); // Pass $table here

        // Replace placeholders in the stub content
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);
        $stub = str_replace('{{model}}', $name, $stub);
        $stub = str_replace('{{modelName}}', $modelName, $stub);
        $stub = str_replace('{{formContent}}', $formContent, $stub);

        // Create the Blade view file inside the new directory
        $filePath = "{$directoryPath}/edit.blade.php";
        File::put($filePath, $stub);

        $this->info('Edit blade created successfully!');
    }

    private function generateFormContent($table, $columns, $lowerName, $object, $plural)
    {
        $excludedColumns = ['id', 'uuid', 'created_at', 'updated_at', 'deleted_at','isactive'];
        $avatarColumns = ['picture', 'logo', 'avatar', 'flag_path', 'image', 'photo'];
        $uniqueColumns = ['email', 'phone','website'];
        $formContent = '';
        $avatarContent = '';
        $hasAvatarColumn = false;

        foreach ($columns as $column) {
            if (in_array($column, $excludedColumns)) {
                continue;
            }

            $columnDetails = DB::getDoctrineColumn($table, $column);
            $nullable = $columnDetails->getNotnull() ? 'NO' : 'YES';

            $optionalClass = $nullable === 'YES' ? 'text-primary' : 'text-danger';
            $requiredAttribute = $nullable === 'YES' ? '' : 'required';

            $inputType = $this->mapColumnTypeToInputType($columnDetails->getType()->getName());

            if (strpos($column, '_id') !== false) {
                $option = Str::plural(str_replace('_id', '', $column));
                $formContent .= <<<EOT

                                            <x-single-select cols="col-md-6" div-id="{$column}" column="{$column}" model="{$lowerName}"
                                                label="{$lowerName}_form_{$column}" optional="{$optionalClass}" id="{$column}" :options="{$option}()" :object={$object} />
                EOT;
            } elseif (in_array($column, $avatarColumns)) {
                $hasAvatarColumn = true;
                $avatarContent .= <<<EOT

                                        <x-image-field :background-url="url('/assets/media/svg/avatars/blank.svg')" :image-url="url(URL::asset(getPicture($object->{$column},'{$plural}')))" avatar-name="{$column}" model="{$lowerName}"/>
                EOT;
            } elseif (in_array($column, $uniqueColumns)) {
                $formContent .= <<<EOT

                                            <x-input-field cols="col-md-6" divId="{$column}" column="{$column}" model="{$lowerName}"
                                                optional="{$optionalClass}" inputType="{$inputType}" className="" columnId="{$column}"
                                                columnValue="{{ $object->{$column} }}" attribute="unique:{$table}" readonly="false" />
                EOT;
            } elseif ($inputType === 'checkbox') {
                $formContent .= <<<EOT

                                            <x-input-checkbox-field
                                                cols="col-md-6"
                                                column="{$column}"
                                                model="{$lowerName}"
                                                optional="{$optionalClass}"
                                                columnValue="{{ $object->{$column} }}"
                                                divID="{$column}"
                                            />
                EOT;
            } elseif ($inputType === 'textarea') {
                $formContent .= <<<EOT

                                            <x-ckeditor-field
                                                cols="col-md-12"
                                                column="{$column}"
                                                model="{$lowerName}"
                                                optional="{$optionalClass}"
                                                columnValue="{{ $object->{$column} }}"
                                                divID="{$column}"
                                            />
                EOT;
            } else {
                $formContent .= <<<EOT

                                            <x-input-field cols="col-md-6" divId="{$column}" column="{$column}" model="{$lowerName}"
                                                optional="{$optionalClass}" inputType="{$inputType}" className="" columnId="{$column}"
                                                columnValue="{{ $object->{$column} }}" attribute="{$requiredAttribute}" readonly="false" />
                EOT;
            }
        }

        if ($hasAvatarColumn) {
            return <<<EOT
                        <div class="col-md-12">
                            <div class="card card-bordered">
                                <div class="card-header">
                                    <h3 class="card-title">{{trans('translation.{$lowerName}_action_edit')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center mb-225rem">
                                            {$avatarContent}
                                        </div>
                                        {$formContent}
                                    </div>
                                </div>
                            </div>
                        </div>
            EOT;
        } else {
            return <<<EOT
                        <div class="col-md-12">
                            <div class="card card-bordered">
                                <div class="card-header">
                                    <h3 class="card-title">{{trans('translation.{$lowerName}_action_edit')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        {$formContent}
                                    </div>
                                </div>
                            </div>
                        </div>
            EOT;
        }
    }

    private function mapColumnTypeToInputType($columnType)
    {
        switch ($columnType) {
            case 'integer':
            case 'bigint':
            case 'smallint':
                return 'number';
            case 'double':
            case 'decimal':
            case 'float':
                return 'number';
            case 'boolean':
                return 'checkbox';
            case 'date':
                return 'date';
            case 'datetime':
            case 'timestamp':
                return 'datetime-local';
            case 'time':
                return 'time';
            case 'text':
            case 'mediumtext':
            case 'longtext':
                return 'textarea';
            case 'json':
                return 'json';
            case 'binary':
                return 'file';
            default:
                return 'text';
        }
    }
}
