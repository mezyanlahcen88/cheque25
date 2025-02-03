<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class GenerateImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:image {table} {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a Blade view for displaying images if the table contains image-related columns';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $table = $this->argument('table');
        $modelName = $this->argument('model');
        $lowerName = strtolower($modelName);
        $plural = Str::plural($lowerName);

           // Get the directory first
           $directoryPath = base_path('Modules/' . $modelName . '/resources/views');
        // Get the table columns
        $columns = Schema::getColumnListing($table);

        // Check if the table contains image-related columns
        $imageColumns = ['image', 'picture', 'logo', 'avatar'];
        $hasImageColumn = false;
        $stringColumns = [];

        foreach ($columns as $column) {
            if (in_array($column, $imageColumns)) {
                $hasImageColumn = true;
            }
            if (Schema::getColumnType($table, $column) === 'string') {
                $stringColumns[] = $column;
            }
        }

        // If the table contains image-related columns, create the Blade view
        if ($hasImageColumn) {
            // Determine firstColumn and secondColumn from string columns
            $firstColumn = isset($stringColumns[3]) ? $stringColumns[3] : 'name';
            $secondColumn = isset($stringColumns[4]) ? $stringColumns[4] : 'description';

            $stub = File::get(app_path('Console/Commands/stubs/template/image.stub'));
            $stub = str_replace('{{lowerName}}', $lowerName, $stub);
            $stub = str_replace('{{plural}}', $plural, $stub);
            $stub = str_replace('{{firstColumn}}', $firstColumn, $stub);
            $stub = str_replace('{{secondColumn}}', $secondColumn, $stub);

            // Create the Blade view file inside the new directory
        $filePath = "{$directoryPath}/image.blade.php";

            // Create directory if it doesn't exist
            if (!File::exists(resource_path("views/{$lowerName}"))) {
                File::delete($filePath);
            }

            // Save the Blade view file
            File::put($filePath, $stub);

            $this->info("Image Blade view created successfully at: {$filePath}");
        } else {
            $this->info("No image-related columns found in the table. No Blade view created.");
        }

        return 0;
    }
}
