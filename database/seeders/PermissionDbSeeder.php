<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PermissionDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('sql/permissions.sql');
        $sql = File::get($path);
        DB::unprepared($sql);
    }
}



