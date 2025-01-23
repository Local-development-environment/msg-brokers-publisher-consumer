<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

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
    public function handle(): int
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest','local');

        $channel = $connection->channel();

        $data = 'hello world';

        $msg = new AMQPMessage(
            $data,
            array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
        );

        $channel->basic_publish($msg, '', 'task_queue');

        echo ' [x] Sent ', $data, "\n";

        $channel->close();

        $connection->close();

        return Command::SUCCESS;
    }
}
