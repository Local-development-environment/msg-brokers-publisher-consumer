<?php

namespace App\Console\Commands;

use App\AMQP\AMQPConnection;
use Illuminate\Console\Command;

class PublisherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:publisher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RabbitMQ Publisher';

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle(AMQPConnection $connection): int
    {
        $data = [
            'message' => 'Hello World from artisan command',
            'from' => 'artisan'
        ];
        $connection->publish('my_queue', $data);

        return Command::SUCCESS;
    }
}
