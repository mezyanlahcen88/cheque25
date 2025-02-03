<?php

namespace Modules\City\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\City\App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('sql/cities.sql');
        $sql = File::get($path);
        DB::unprepared($sql);
    }
}
