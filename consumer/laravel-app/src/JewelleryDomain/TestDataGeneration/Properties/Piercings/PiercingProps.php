<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Piercings;

use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;

final readonly class PiercingProps implements PropertyGeneratorInterface
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
