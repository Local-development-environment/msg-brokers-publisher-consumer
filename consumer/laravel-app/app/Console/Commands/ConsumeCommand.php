<?php

namespace App\Console\Commands;

use App\AMQP\AMQPClient;
use Illuminate\Console\Command;

class ConsumeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RabbitMQ Consumer';

    /**
     * Execute the console command.
     */
    public function handle(AMQPClient $connection)
    {
        $callback = function ($msg) {

            dd($msg);
//            echo ' [x] Received ', $msg->getBody(), "\n";
//            sleep(substr_count($msg->getBody(), '.'));
            echo " [x] Done\n";
        };

        $data = $connection->consume('my_queue_1', $callback);
    }
}
