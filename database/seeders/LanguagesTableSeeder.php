<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('sql/languages.sql');
        $sql = File::get($path);
        DB::unprepared($sql);
    }
}
