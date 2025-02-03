<?php

namespace Modules\Sidebar\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sidebar\App\Models\Sidebar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('sql/sidebars.sql');
        $sql = File::get($path);
        DB::unprepared($sql);
    }
}
