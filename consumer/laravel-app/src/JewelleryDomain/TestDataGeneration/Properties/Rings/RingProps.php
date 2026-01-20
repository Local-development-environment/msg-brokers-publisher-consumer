<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Rings;

use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;

final readonly class RingProps implements PropertyGeneratorInterface
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
