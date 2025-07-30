<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

final class RingProducer implements JewelleryProducerInterface
{

    public function createJewellery(): string
    {
        return "A new ring is ready";
    }
}
