<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;
use Domain\Jewelleries\JewelleryBuilder\SizePricePropsTrait;
use Illuminate\Support\Facades\DB;

final readonly class BeadProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['prcsMetal'];
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

        $clasps = config('data-seed.data_items.jw_clasps');
        $sizes = data_get(config('data-seed.data_items.bead_sizes'), '*.value');
        $sizePrices = $this->getSizePrice($price, $sizes);

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => $clasps[array_rand($clasps, 1)],
            'bead_sizes' => data_get($sizePrices, '*.size'),
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
