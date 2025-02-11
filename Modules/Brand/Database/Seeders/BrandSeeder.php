<?php

namespace Modules\Brand\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Brand\App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Brand::factory(50)->create();

    }
}
