<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\AMQP\AMQPClient;
use Illuminate\Console\Command;
use JewelleryDomain\TestDataGeneration\BaseJewelleryGenerator;
use JewelleryDomain\TestDataGeneration\Jeweller;
use function Laravel\Prompts\select;

final class ProduceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:produce';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RabbitMQ Producer';

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle(AMQPClient $connection): int
    {
        $queue = select(
            label: 'What a queue do you want to use?',
            options: [
                'consumer jw.generate' => 'jw.generate'
            ],
        );

        $jeweller = new Jeweller();

        for ($i = 0; $i <= 100; $i++) {
            $data = json_encode($jeweller->buildJewellery(new BaseJewelleryGenerator()), JSON_UNESCAPED_UNICODE);
            $connection->publish($queue, $data);
        }

//        $connection->publish($queue, $data);

        return Command::SUCCESS;
    }
}
