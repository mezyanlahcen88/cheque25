<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Modules\User\App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'Hassan',
            'last_name' => 'Mzn',
            'email' => 'admin@admin.com',
            'password' => bcrypt('azerty123'),
            'isactive' => 1,
            'isSuperAdmin' => 1,
            'state_id' => 10,
            'city_id' => 100,
            'language_id' => 1,
            'phone' => '+212602086429',
            'picture' => 'avatar.jpg',
            'address' => 'maroc kenitra elwafaa',
            'code_postale' => '14000',
            'gender' => 'male',
            'email_verified_at'=>now()
        ]);

        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole($role->id);
    }
}
