<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

use Exception;

final class JewelleryFactory
{
    /**
     * @throws Exception
     */
    public function createJewellery($type): JewelleryProducerInterface
    {
        return match ($type) {
            'bracelet' => new BraceletProducer(),
            'chain' => new ChainProducer(),
            'ring' => new RingProducer(),
            default => throw new Exception("Invalid jewellery type"),
        };
    }
}
