<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\AMQP\AMQPClient;
use Domain\JewelleryGenerator\BaseJewelleryBuilder;
use Domain\JewelleryGenerator\Jeweller;
use Illuminate\Console\Command;
use function Laravel\Prompts\select;

final class PublisherCommand extends Command
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
                'publisher jw.generate' => 'jw.generate'
            ],
        );

        $jeweller = new Jeweller();

//        $data = config('data-mock-rabbitmq.jewellery');
        $data = $jeweller->buildJewellery(new BaseJewelleryBuilder());
//        $connection->publish($queue, $data[1]);
        $connection->publish($queue, $data);

        return Command::SUCCESS;
    }
}
