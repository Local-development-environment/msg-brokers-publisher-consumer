<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertRings;

use JewelleryDomain\Jewellery\SpecProperties\Rings\RingSpecific\Enums\RingSpecificNamesEnum;

final readonly class InsertRingGenerate
{
    public function __construct(private array $properties)
    {
    }

    public function getPInsert(): array
    {
//        dd($this->properties['property']['ringSpecific']);
        if ($this->properties['property']['ringSpecific'] === RingSpecificNamesEnum::WEDDING->value) {
            return [];
        } elseif ($this->properties['property']['ringSpecific'] === RingSpecificNamesEnum::ENGAGEMENT->value) {
            return [];
        }
    }
}
