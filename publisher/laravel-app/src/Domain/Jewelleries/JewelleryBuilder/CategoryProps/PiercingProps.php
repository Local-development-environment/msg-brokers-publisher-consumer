<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;

final readonly class PiercingProps implements CategoryPropsBuilderInterface
{
    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $prop = $this->properties;
        return [];
    }
}
