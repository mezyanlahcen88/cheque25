<?php

namespace Database\Seeders;




use Illuminate\Database\Seeder;
use Database\Seeders\ProfessionSeeder;
use Modules\Setting\Database\Seeders\SettingSeeder;
use Modules\Sidebar\Database\Seeders\SidebarSeeder;
use Modules\Numerotation\Database\Seeders\NumerotationSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            LanguagesTableSeeder::class,
            GroupeSeeder::class,
            StatesSeeder::class,
            CitiesSeeder::class,
            PermissionDbSeeder::class,
            UserSeeder::class,
            LanguageTranslateDbSeeder::class,
            // LanguageTranslateSeeder::class,
            SettingSeeder::class,
            SidebarSeeder::class,
            ProfessionSeeder::class,
            NumerotationSeeder::class,

        ]);


    }
}
