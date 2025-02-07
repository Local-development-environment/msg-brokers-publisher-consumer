<?php

declare(strict_types=1);

namespace App\AMQP;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Connection\AMQPConnectionConfig;
use PhpAmqpLib\Connection\AMQPConnectionFactory;

final class AMQPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerConnection();
    }

    private function registerConnection(): void
    {
        $this->app->bind(AbstractConnection::class, function () {
            return AMQPConnectionFactory::create(
                $this->getConfig()
            );
        });
    }

    private function getConfig(): AMQPConnectionConfig
    {
        $config = new AMQPConnectionConfig();

        $config->setHost(config('amqp.connection.host'));
        $config->setPort(intval(config('amqp.connection.port')));
        $config->setUser(config('amqp.connection.user'));
        $config->setPassword(config('amqp.connection.pass'));
        $config->setVhost(config('amqp.connection.vhost'));
        $config->setIsSecure(config('amqp.connection.tls'));

        return $config;
    }
}
