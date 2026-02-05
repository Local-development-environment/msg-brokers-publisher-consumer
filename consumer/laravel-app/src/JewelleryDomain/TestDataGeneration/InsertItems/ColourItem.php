<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\BeadItems\BeadItem\Enums\BeadItemNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\InsertType\Enums\InsertTypeNamesEnum;
use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;

final class ColourItem
{
    public function __construct()
    {}

    public function getColourItem(string $insertItem, string $insertType): string
    {
        if ($insertType === InsertTypeNamesEnum::BEAD_ITEM->value) {
            $stone = BeadItemNamesEnum::from($insertItem)->stones();
            $colours = StoneNamesEnum::from($stone)->stoneColours();

            return $this->getRandomColour($colours);

        } else if ($insertType === InsertTypeNamesEnum::STONE->value) {
            $colours = StoneNamesEnum::from($insertItem)->stoneColours();

            return $this->getRandomColour($colours);
        } else {
            return 'error: colourItem is wrong';
        }
    }

    private function getRandomColour(array $colours): string
    {
        $arrayProbabilities = [];

        foreach ($colours as $colour) {
            for ($i = 0; $i < $colour[1]; $i++) {
                $arrayProbabilities[] = $colour[0];
            }
        }

        shuffle($arrayProbabilities);

        return $arrayProbabilities[array_rand($arrayProbabilities)];
    }
}
