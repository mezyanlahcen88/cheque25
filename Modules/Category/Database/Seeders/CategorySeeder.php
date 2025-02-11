<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Category::factory(50)->create();

    }
}
