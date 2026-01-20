<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Chains;

use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;

final readonly class ChainProps implements PropertyGeneratorInterface
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
