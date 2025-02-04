<?php

namespace App\Console\Commands;

use App\AMQP\AMQPClient;
use Illuminate\Console\Command;
use function Laravel\Prompts\select;

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
    public function handle(AMQPClient $connection): int
    {
        $queue = select(
            label: 'What a queue do you want to use?',
            options: [
                'jewellery.store' => 'Jewellery store',
                'jewellery.update' => 'Jewellery update',
            ],
        );

        $data = config('data-mock-rabbitmq.jewellery');
        $connection->publish($queue, $data);

        return Command::SUCCESS;
    }
}
