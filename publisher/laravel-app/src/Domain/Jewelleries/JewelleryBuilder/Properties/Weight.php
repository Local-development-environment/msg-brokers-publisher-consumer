<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

final class Weight
{
    public function getWeight(): float
    {
        return fake()->randomFloat(2, 0, 10);
    }
}
