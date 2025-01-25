<?php

declare(strict_types=1);

namespace App\AMQP;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Message\AMQPMessage;

final class AMQPConnection
{
    public AbstractConnection $connection;

    public function __construct()
    {}

    /**
     * @throws \Exception
     */
    public function publish(string $queue, $message): void
    {
        $this->connection = App::make(AbstractConnection::class);

        if (!$message instanceof AMQPMessage) {
            $message = $this->createMessage($message);
        }

        $channel = $this->connection->channel();
        $channel->basic_publish($message, '', 'task_queue');
        $channel->close();
        $this->connection->close();

        Log::info("[{$queue}] Published message", [
            'body' => $message->getBody()
        ]);
    }

    private function createMessage($message): AMQPMessage
    {
        if (is_array($message)) {
            $message = json_encode($message);
        } elseif (!is_string($message)) {
            $message = strval($message);
        }

        return new AMQPMessage($message);
    }

    /**
     * @throws \Exception
     */
    public function consume(string $queue, \Closure $callback): void
    {
        $this->connection = App::make(AbstractConnection::class);

        $channel = $this->prepareConsume($queue, function (AMQPMessage $message) use ($queue, $callback) {
            Log::info("[{$queue}] Received message", [
                'body' => $message->getBody()
            ]);
            $message->ack();
            return $callback(json_decode($message->getBody(), true));
        });

        while ($channel->is_open()) {
            $channel->wait();
        }

        $channel->close();
        $this->connection->close();
    }

    private function prepareConsume(string $queue, \Closure $callback): AMQPChannel
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queue, durable: true, auto_delete: false);
        $channel->basic_consume($queue, callback: $callback);
        return $channel;
    }
}
