<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CitiesSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('sql/cities.sql');
        $sql = File::get($path);
        DB::unprepared($sql);
        //DB::statement('ALTER SEQUENCE countries_id_seq RESTART WITH 251');
    }
}
