<?php

namespace App\Console\Commands;

use App\AMQP\AMQPClient;
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
    public function handle(AMQPClient $client): int
    {
        $data = [
            'message' => 'Hello World from artisan command',
            'from' => 'artisan'
        ];
        $client->publish('my_queue_1', $data);

        return Command::SUCCESS;
    }
}
