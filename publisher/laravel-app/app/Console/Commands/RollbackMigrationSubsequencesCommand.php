<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class RollbackMigrationSubsequencesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:rollback-subsequences';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback migration subsequences';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('migrate:rollback', ['--path=/database/migrations/insert_schema']);
        $this->call('migrate:rollback', ['--path=/database/migrations/jewellery_schema']);
    }
}
