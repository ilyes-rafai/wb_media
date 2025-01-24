<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RemoveModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:model {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a model and all associated files created with make:model -a';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        // Define the paths of files to delete
        $files = [
            app_path("Models/{$name}.php"),
            base_path("database/migrations/*_create_" . strtolower($name) . "s_table.php"),
            base_path("database/factories/{$name}Factory.php"),
            base_path("database/seeders/{$name}Seeder.php"),
            app_path("Http/Controllers/{$name}Controller.php"),
            app_path("Policies/{$name}Policy.php"),
        ];

        foreach ($files as $path) {
            foreach (glob($path) as $file) {
                if (File::exists($file)) {
                    File::delete($file);
                    $this->info("Deleted: {$file}");
                }
            }
        }

        $this->info("All files associated with the {$name} model have been deleted.");
    }
}
