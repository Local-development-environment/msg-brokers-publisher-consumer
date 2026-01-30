<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Traits;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use Random\RandomException;

trait SpecPropertyTrait
{
    private function getNameFunction($category): string
    {
        return match ($category) {
            JewelleryCategoryNamesEnum::BEADS->value          => 'getBeadProps',
            JewelleryCategoryNamesEnum::BRACELETS->value      => 'getBraceletProps',
            JewelleryCategoryNamesEnum::BROOCHES->value       => 'getBroochProps',
            JewelleryCategoryNamesEnum::CHAINS->value         => 'getChainProps',
            JewelleryCategoryNamesEnum::CHARM_PENDANTS->value => 'getCharmPendantProps',
            JewelleryCategoryNamesEnum::CUFF_LINKS->value     => 'getCuffLinkProps',
            JewelleryCategoryNamesEnum::EARRINGS->value       => 'getEarringProps',
            JewelleryCategoryNamesEnum::NECKLACES->value      => 'getNecklaceProps',
            JewelleryCategoryNamesEnum::PENDANTS->value       => 'getPendantProps',
            JewelleryCategoryNamesEnum::PIERCINGS->value      => 'getPiercingProps',
            JewelleryCategoryNamesEnum::RINGS->value          => 'getRingProps',
            JewelleryCategoryNamesEnum::TIE_CLIPS->value      => 'getTieClipProps',
        };
    }

    /**
     * @throws RandomException
     */
    private function getSizeQuantity(array $sizes, int $amountKeys): array
    {
        $arrSizeQuantities = [];

        $randSizes = array_rand($sizes, $amountKeys);

        $result = array_intersect_key(
            $sizes,
            array_flip($randSizes)
        );

        foreach ($result as $key => $value) {
            $arrSizeQuantities[$key]['size']     = $value;
            $arrSizeQuantities[$key]['quantity'] = rand(0, 10);
        }

        return array_values($arrSizeQuantities);
    }

    /**
     * @throws RandomException
     */
    private function getSharedSpecProperties(): array
    {
        $specProps = [];
        $dimensions = [];

        if ($this->properties['jewelleryCategory'] === JewelleryCategoryNamesEnum::BROOCHES->value) {
            $dimensions = [
                'height' => rand(20, 50),
                'width'  => rand(10, 30),
            ];
        } elseif ($this->properties['jewelleryCategory'] === JewelleryCategoryNamesEnum::CHARM_PENDANTS->value) {
            $dimensions = [
                'height' => rand(20, 40),
                'width'  => rand(5, 15),
            ];
        } elseif ($this->properties['jewelleryCategory'] === JewelleryCategoryNamesEnum::PENDANTS->value) {
            $dimensions = [
                'height' => rand(10, 25),
                'width'  => rand(10, 15),
            ];
        }

        $specProps['nameFunction']       = $this->getNameFunction($this->properties['jewelleryCategory']);
        $specProps['metric']['quantity'] = rand(0, 10);
        $specProps['dimensions']         = $dimensions;

        return $specProps;
    }
}
