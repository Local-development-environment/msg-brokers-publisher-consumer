<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest','local');
        $channel = $connection->channel();
        $data = 'hello world';
        $msg = new AMQPMessage($data, array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
        $channel->basic_publish($msg, '', 'task_queue');
//        dd($msg);
        $channel->close();
        $connection->close();
    }
}
