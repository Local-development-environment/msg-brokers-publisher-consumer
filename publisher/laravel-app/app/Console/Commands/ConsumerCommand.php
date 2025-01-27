<?php

namespace App\Console\Commands;

use App\AMQP\AMQPClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ConsumerCommand extends Command
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
    public function handle(AMQPClient $client): int
    {
//        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest','local');

        $client->consume('my_queue', function (\Closure $callback) {
            return $callback();
        });
//        $channel = $client->channel();
//        $channel->queue_declare('task_queue', false, true, false, false);
//
//        echo " [*] Waiting for messages. To exit press CTRL+C\n";
//
//        $callback = function ($msg) {
//            echo ' [x] Received ', $msg->body, "\n";
//            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
//        };
//
//        $channel->basic_qos(null, 1, null);
//
//        $channel->basic_consume('task_queue', '', false, false, false, false, $callback);
//
//        while ($channel->is_consuming()) {
//            $channel->wait();
//        }
//
//        $channel->close();

        return Command::SUCCESS;
    }
}
