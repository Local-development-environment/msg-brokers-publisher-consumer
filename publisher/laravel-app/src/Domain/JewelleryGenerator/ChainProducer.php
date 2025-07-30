<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

final class ChainProducer implements JewelleryProducerInterface
{
    public function createJewellery(): string
    {
        return "A new chain is ready";
    }
}
