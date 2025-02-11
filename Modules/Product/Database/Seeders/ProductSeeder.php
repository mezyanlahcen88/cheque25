<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Product::factory(1000)->create();



    }
}
