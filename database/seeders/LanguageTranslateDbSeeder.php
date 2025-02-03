<?php
namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LanguageTranslateDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $path = database_path('sql/language_translates.sql');
        $sql = File::get($path);
        DB::unprepared($sql);


    }
}
