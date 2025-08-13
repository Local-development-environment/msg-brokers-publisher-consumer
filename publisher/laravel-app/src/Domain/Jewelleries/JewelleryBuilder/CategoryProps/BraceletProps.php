<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;
use Illuminate\Support\Arr;

final readonly class BraceletProps implements CategoryPropsBuilderInterface
{
    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['prcsMetal'];
        $insert = $this->properties['insert'];


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
        $sizePrices = $this->getBraceletSizePrice($price);

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => $clasps[array_rand($clasps, 1)],
            'weaving' => $this->getWeaving(),
            'body_part' => $this->getBodyPart(),
            'bracelet_sizes' => data_get($sizePrices, '*.size'),
            'bracelet_bases' => $this->getBraceletBase($insert),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price')
        ];
    }

    private function getBraceletSizePrice($price): array
    {
        $sizes = data_get(config('data-seed.data_items.bracelet_sizes'), '*.value');
        $tmp = [];
        foreach ($sizes as $size) {
            $priceSize = $price + ($price * (($size - 15) * 0.01));
            $tmp[] = ['size' => $size, 'price' => round($priceSize, -1), 'quantity' => rand(0, 10)];
        }

        return Arr::random($tmp, rand(3, count($sizes)));
    }

    private function getWeaving(): array
    {
        $is_weaving = Arr::random([0, 1, 1]);

        $weavings = config('data-seed.data_items.jw_weavings');
        if ($is_weaving === 1) {
            return [
                'weaving' => Arr::random($weavings),
                'fullness' => Arr::random(['полнотелая', 'полнотелая', 'полнотелая', 'пустотелая']),
                'wire_diameter' => fake()->randomFloat(1, 0.5, 1.5) . ' мм'
            ];
        } else {
            return [];
        }
    }

    private function getBodyPart(): string
    {
        $bodyParts = config('data-seed.data_items.body_parts');
        $prepBodyParts = array_fill(0, 20, $bodyParts[0]);
        $prepBodyParts[] = $bodyParts[1];

        return Arr::random($prepBodyParts);

    }

    private function getBraceletBase(array $insert): string
    {
        if ($insert) {
            if (count($insert) === 1) {
                if ($insert[0]['stone'] === 'жемчуг') {
                    $braceletBases = array_diff(config('data-seed.data_items.bracelet_bases'), ['металлическая', 'шнурок']);
//                    dd($braceletBases);
                    return Arr::random($braceletBases);
                }
            }
        }

        return 'металлическая';

    }
}
