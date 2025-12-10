<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Earrings;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspBuilderEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeBuilderEnum;

final readonly class EarringProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $properties = $this->properties;

        $clasps = EarringClaspBuilderEnum::cases();
        $types = EarringTypeBuilderEnum::cases();

        return [
            'quantity' => $this->getQuantity(),
            'price' => $this->getPriceDifferentiation($properties['metalItem']['metalType']),
            'dimensions' => [
                'высота' => fake()->randomFloat(1, 3, 6) . ' см',
                'ширина' => fake()->randomFloat(1, 2, 4) . ' см',
            ],
            'clasp' => $clasps[array_rand($clasps)]->value,
            'earring_type' => $types[array_rand($types)]->value,
        ];
    }
}
