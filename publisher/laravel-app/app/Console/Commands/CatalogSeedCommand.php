<?php
declare(strict_types=1);

namespace App\Console\Commands;

use Database\Seeders\BuildJewellerySeeder;
use Illuminate\Console\Command;

final class CatalogSeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'catalog:seed {--items=}';

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
        (new BuildJewellerySeeder())->callWith(BuildJewellerySeeder::class, ['items' => $this->option('items')]);
    }
}
