<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Necklaces;

use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;

final readonly class NecklaceProps implements PropertyGeneratorInterface
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
