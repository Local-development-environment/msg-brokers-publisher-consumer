<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Beads;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspBuilderEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeBuilderEnum;
use Illuminate\Support\Facades\DB;

final readonly class BeadProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['metalType'];
//        $insert = $this->properties['insert'];


        if ($metal === 'золото') {
            $price = round(rand(70000, 400000), -1);
        } elseif ($metal === 'серебро') {
            $price = round(rand(11000, 80000), -1);
        } elseif ($metal === 'платина') {
            $price = round(rand(75000, 365000), -1);
        } else {
            $price = round(rand(60000, 355000), -1);
        }

        $sizePrices = $this->getSizePrice($price, NeckSizeBuilderEnum::cases());

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => ClaspBuilderEnum::cases()[array_rand(ClaspBuilderEnum::cases())]->value,
            'bead_sizes' => data_get($sizePrices, '*.size'),
//            'bead_sizes' => BeadSizeListEnum::cases(),
            'bead_bases' => $this->getBeadBase(),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price')
        ];
    }

    private function getBeadBase(): string
    {
        return DB::table('jw_properties.bead_bases')->get()->random()->name;
    }
}
