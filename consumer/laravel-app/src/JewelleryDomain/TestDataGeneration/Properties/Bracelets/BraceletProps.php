<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Bracelets;

use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;

final readonly class BraceletProps implements PropertyGeneratorInterface
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
