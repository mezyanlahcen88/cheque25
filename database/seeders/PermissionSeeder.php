<?php

namespace Database\Seeders;

// use App\Models\Permission as ModelsPermission;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        DB::table('permissions')->insert([
            ['name' => 'user-create', 'libele' => 'Create', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-show', 'libele' => 'Show', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-edit', 'libele' => 'Update', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-delete', 'libele' => 'Delete', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-list', 'libele' => 'List', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-trashed', 'libele' => 'Trashed list', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-force-delete', 'libele' => 'Force delete', 'guard_name' => 'web', 'groupe_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-restore', 'libele' => 'Restore', 'guard_name' => 'web', 'groupe_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-export', 'libele' => 'Export', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-multiple-delete', 'libele' => 'Multiple delete', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name' => 'role-create', 'libele' => 'Create', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-show', 'libele' => 'Show', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-edit', 'libele' => 'Edit', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-delete', 'libele' => 'Delete', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-list', 'libele' => 'List', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['name' => 'systemlanguage-create', 'libele' => 'Create', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-show', 'libele' => 'Show', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-edit', 'libele' => 'Edit', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-delete', 'libele' => 'Delete', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-list', 'libele' => 'Featured', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-translation', 'libele' => 'Translation', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name' => 'setting-create', 'libele' => 'Create', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'setting-show', 'libele' => 'Show', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'setting-edit', 'libele' => 'Edit', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'setting-delete', 'libele' => 'Delete', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'setting-list', 'libele' => 'List', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name' => 'sidebar-dashboard', 'libele' => 'dashboard', 'guard_name' => 'web', 'groupe_id' =>6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-manage-users', 'libele' => 'Manage users', 'guard_name' => 'web', 'groupe_id' =>6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name' => 'sidebar-countries', 'libele' => 'Countries', 'guard_name' => 'web', 'groupe_id' =>6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-languages', 'libele' => 'Languages', 'guard_name' => 'web', 'groupe_id' =>6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name' => 'sidebar-settings', 'libele' => 'Settings', 'guard_name' => 'web', 'groupe_id' =>6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);



    }
}



