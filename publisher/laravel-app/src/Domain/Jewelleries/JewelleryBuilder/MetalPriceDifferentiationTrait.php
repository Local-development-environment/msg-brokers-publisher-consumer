<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

trait MetalPriceDifferentiationTrait
{
    protected function getPriceDifferentiation(string $metal): float
    {
        if ($metal === 'золото') {
            return round(rand(70000, 400000), -1);
        } elseif ($metal === 'серебро') {
            return round(rand(11000, 80000), -1);
        } elseif ($metal === 'платина') {
            return round(rand(75000, 365000), -1);
        } else {
            return round(rand(60000, 355000), -1);
        }
    }
}
