<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

interface JewelleryProducerInterface
{
    public function createJewellery(): array;
}
