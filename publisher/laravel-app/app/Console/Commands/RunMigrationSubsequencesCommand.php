<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class RunMigrationSubsequencesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:run-subsequences';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migration subsequences';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('migrate', ['--path=/database/migrations/jewellery_schema']);
        $this->call('migrate', ['--path=/database/migrations/insert_schema']);
    }
}
