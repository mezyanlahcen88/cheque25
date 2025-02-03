<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use App\Models\LanguageTranslate;
use Illuminate\Support\Facades\Schema;

class generateTranslation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:translation {table} {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is for generating translation';

    /**
     * Converts a field name from snake_case to a human-readable format.
     *
     * @param string $fieldName The field name in snake_case.
     * @return string The converted field name in human-readable format.
     */
    public function convertFieldName($fieldName)
    {
        // Remove "_id" if it exists at the end
        $fieldName = preg_replace('/_id$/', '', $fieldName);
        return ucfirst(str_replace('_', ' ', $fieldName));
    }

    /**
     * Converts a field name from snake_case to a human-readable format in lowercase.
     *
     * @param string $fieldName The field name in snake_case.
     * @return string The converted field name in human-readable format.
     */
    public function convertFieldLower($fieldName)
    {
        // Remove "_id" if it exists at the end
        $fieldName = preg_replace('/_id$/', '', $fieldName);

        return str_replace('_', ' ', $fieldName);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $table = $this->argument('table');
        $model = $this->argument('model');
        $modelLower = strtolower($model);
        $plural = Str::plural($modelLower);
        if (!Schema::hasTable($table)) {
            $this->error('Table ' . $table . ' does not exist.');
            return 1;
        }

        $columns = Schema::getColumnListing($table);
        $columns = array_diff($columns, ['id']);


        $now = Carbon::now();
        $translations = [
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_action_add',
                'translation' => 'Add ' . $modelLower,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_action_show',
                'translation' => 'Show ' . $modelLower,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_action_edit',
                'translation' => 'Edit ' . $modelLower,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_action_delete',
                'translation' => 'Delete ' . $modelLower,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_action_restore',
                'translation' => 'Restore ' . $modelLower,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_add',
                'translation' => $model . ' successfully created',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_show',
                'translation' => $model . ' successfully showed',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_edit',
                'translation' => $model . ' successfully updated',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_delete',
                'translation' => $model . ' successfully deleted',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_restore',
                'translation' => $model . ' successfully restored',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_activated',
                'translation' => $model . ' has been successfully activated',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_inactivated',
                'translation' => $model . ' has been successfully inactivated',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_form_manage_'.$plural,
                'translation' => 'Manage ' . $plural,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_form_'.$plural.'_list',
                'translation' => 'List of ' . $plural,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_form_deleted_'.$plural.'_list',
                'translation' => 'List deleted ' . $plural,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_form_manage_deleted_'.$plural,
                'translation' => 'Manage deleted ' . $plural,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_delete_multiple',
                'translation' => 'Selected ' .$plural.' have been successfully deleted.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_fail_delete_multiple',
                'translation' => 'Failed to delete the selected ' .$plural.'. Please try again.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_restore_multiple',
                'translation' => 'Selected ' .$plural.' have been successfully restored.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_fail_restore_multiple',
                'translation' => 'Failed to restore the selected ' .$plural.'. Please try again.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_activate_multiple',
                'translation' => 'Selected ' .$plural.' have been successfully activated.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_message_fail_activate_multiple',
                'translation' => 'Failed to activate the selected ' .$plural.'. Please try again.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'model' => $model,
                'language_id' => 1,
                'label' => 'navigation_navigation_'.strtolower($model),
                'translation' => $plural,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($columns as $column) {
            $translations[] = [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_table_' . $column,
                'translation' => $this->convertFieldName($column),
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $translations[] = [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_form_' . $column,
                'translation' => $this->convertFieldName($column),
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $translations[] = [
                'model' => $model,
                'language_id' => 1,
                'label' => $modelLower . '_form_' . $column . '_placeholder',
                'translation' => 'Enter ' . $this->convertFieldLower($column),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        LanguageTranslate::insert($translations);
        storeTranslaionToLang();
        $this->info('Translation generated successfully for Model :'.$model);
    }
}
