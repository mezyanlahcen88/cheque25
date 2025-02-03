<?php

namespace Modules\Secteur\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Secteur\App\Models\Secteur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $path = database_path('sql/secteurs.sql');
        $sql = File::get($path);
        DB::unprepared($sql);
    }
}
