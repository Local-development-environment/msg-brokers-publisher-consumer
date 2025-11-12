<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries;

final class ApproxWeight
{
    public function getApproxWeight(): float
    {
        return fake()->randomFloat(2, 0, 10);
    }
}
