<?php

namespace App\Console\Commands;

use App\AMQP\AMQPClient;
use Illuminate\Console\Command;

class ProduceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:produce';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RabbitMQ Producer';

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle(AMQPClient $connection): int
    {
        $data = [
            'message' => 'Hello World from artisan command',
            'from' => 'artisan'
        ];
        $connection->publish('my_queue', $data);

        return Command::SUCCESS;
    }
}
