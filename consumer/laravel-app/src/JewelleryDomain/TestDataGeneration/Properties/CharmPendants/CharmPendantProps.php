<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\CharmPendants;

use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;

final readonly class CharmPendantProps implements PropertyGeneratorInterface
{
    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $item = $this->properties;

        return $item;
    }
}
