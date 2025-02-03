<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Sidebar\App\Models\Sidebar;

class generateSidebar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:sidebar {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add sidebar to sidebars table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $className = ucfirst($name);
        $lowerName = strtolower($name);
        // ###################### Crud section ######################
        $this->createSidebar($className,$lowerName);

    }

    /**
     * Create a new Sidebar.
     *
     * @param string $className
     * @param string $lowerName
     * @return void
     */
    protected function createSidebar($className ,$lowerName)
    {
        // Assuming you have a Group model and a groups table
        $Sidebar = new Sidebar();
        $Sidebar->name = $className;
        $Sidebar->permission = $lowerName.'-list';
        $Sidebar->route = $lowerName;
        $Sidebar->save();
        storeSidebar();
        $this->info("Sidebar '{$className}' created successfully!");
    }

}
