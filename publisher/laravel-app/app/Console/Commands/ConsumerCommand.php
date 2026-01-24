<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\AMQP\AMQPAdapter\MessageParser;
use App\AMQP\AMQPClient;
use Illuminate\Console\Command;
use function Laravel\Prompts\select;

final class ConsumerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:consumer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RabbitMQ Consumer';

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle(AMQPClient $connection): int
    {
        $queue = select(
            label: 'What is a queue you need?',
            options: [
                'consumer jw.generate' => 'jw.generate'
            ],
        );

        $callback = function ($msg) {
            (new MessageParser($msg))->parser();
        };

        $connection->consume($queue, $callback);

        return Command::SUCCESS;
    }
}
