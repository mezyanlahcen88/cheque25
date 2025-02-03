<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Groupe;
use Illuminate\Console\Command;

use Spatie\Permission\Models\Permission;

class CreateGroupAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:group-and-permissions {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $className = ucfirst($name);
        $lowerName = strtolower($name);
        // ###################### Crud section ######################
        $groupId = $this->createGroup($className);
        $this->createPermissions($groupId,$lowerName);
        // $role = Role::first();
        // $user = User::first();
        // $permissions = Permission::pluck('id', 'id')->all();
        // $role->syncPermissions($permissions);
        // $user->assignRole($role->id);
    }

    /**
     * Create a new group.
     *
     * @param string $name
     * @return void
     */
    protected function createGroup($name)
    {
        // Assuming you have a Group model and a groups table
        $group = new Groupe();
        $group->name = $name;
        $group->save();

        $this->info("Group '{$name}' created successfully!");
        return $group->id;
    }
/**
     * Create permissions for the specified group.
     *
     * @param int $groupId
     * @return void
     */
    protected function createPermissions($groupId , $lowerName)
    {
        $permissions = [
            [
                'name' => $lowerName.'-create',
                'libele' => 'Create',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName.'-show',
                'libele' => 'Show',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName.'-edit',
                'libele' => 'Update',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName.'-delete',
                'libele' => 'Delete',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName.'-list',
                'libele' => 'List',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName.'-trashed',
                'libele' => 'Trashed list',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName . '-force-delete',
                'libele' => 'Force delete',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName.'-restore',
                'libele' => 'Restore',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName.'-export',
                'libele' => 'Export',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => $lowerName.'-multiple-delete',
                'libele' => 'Multiple delete',
                'guard_name' => 'web',
                'groupe_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ]
        ];

        Permission::insert($permissions);

        $this->info('Permissions created successfully!');
    }
}
