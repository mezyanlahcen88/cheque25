<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Groupe;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class moduleMigrationCommand extends Command
{
    protected $signature = 'make:module-base-migration {table} {model}';

    protected $description = 'Generate translation model create and edit';

    public function handle()
    {
        $model = $this->argument('model');
        $table = $this->argument('table');

        // Generate the translation
        Artisan::call('generate:translation', ['table' => $table, 'model' => $model]);
        // Generate the advanced model
        Artisan::call('make:module-model', ['table' => $table, 'model' => $model]);
        // Generate the advanced cretae blade
        Artisan::call('make:create', ['table' => $table, 'model' => $model]);
        // Generate the advanced edit blade
        Artisan::call('make:edit', ['table' => $table, 'model' => $model]);
        // Generate the advanced filter blade
        Artisan::call('make:filter', ['table' => $table, 'model' => $model]);
        // Generate the advanced store request
        Artisan::call('make:module-storeRequest', ['table' => $table, 'model' => $model]);
        // Generate the advanced store request
        Artisan::call('make:module-updateRequest', ['table' => $table, 'model' => $model]);
        // Generate the advanced datatble php
        Artisan::call('make:module-datatable', ['table' => $table, 'model' => $model]);
        // Generate the advanced datatble js
        Artisan::call('make:module-datatable-js', ['table' => $table, 'model' => $model]);

        // Generate the advanced image
        Artisan::call('make:image', ['table' => $table, 'model' => $model]);
        $this->info('Generate translation model create and edit for :' . $model);
    }
}
