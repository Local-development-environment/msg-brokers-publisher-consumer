<?php

declare(strict_types=1);

namespace App\AMQP;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Random\RandomException;

final class AMQPClient
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

        $channel = $this->send($queue, $message);

        $this->close($channel);
        Log::info("[{$queue}] Published message", [
            'body' => $message->getBody()
        ]);
    }

    /**
     * @throws \Exception
     */
    public function consume(string $queue, \Closure $callback): void
    {
        $this->connection = App::make(AbstractConnection::class);

        $channel = $this->prepareConsume($queue, function (AMQPMessage $message) use ($queue, $callback) {
            Log::info("[{$queue}] Received message", [
                'body' => $message->getBody(),
            ]);
            $message->ack();
            return $callback(json_decode($message->getBody(), true));
        });

        while ($channel->is_open()) {
            $channel->wait();
        }

        $this->close($channel);
    }

    private function prepareConsume(string $queue, \Closure $callback): AMQPChannel
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queue, durable: true, auto_delete: false);
        $channel->basic_consume($queue, callback: $callback);
        return $channel;
    }

    private function send(string $queue, AMQPMessage $message): AMQPChannel
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queue, durable: true, auto_delete: false);
        $channel->basic_publish($message, '', $queue);
        return $channel;
    }

    /**
     * @throws \Exception
     */
    private function close(AMQPChannel $channel): void
    {
        $channel->close();
        $this->connection->close();
    }

    private function createMessage($message): AMQPMessage
    {
        $partNumber = 'no';

        if (is_array($message)) {
            $partNumber = $message['data']['attributes']['part_number'] ?? 0;
            $message = json_encode($message, JSON_UNESCAPED_UNICODE);
        } elseif (!is_string($message)) {
            $message = strval($message);
        }

        return new AMQPMessage($message, ['message_id' => $partNumber]);
    }
}
