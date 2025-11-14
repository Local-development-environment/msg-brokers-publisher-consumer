<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Coverings;

use Domain\Coverings\CoveringShades\Enums\CoveringShadeListEnum;
use Domain\Coverings\CoveringTypes\Enums\CoveringTypeListEnum;

final class CoveringShade
{
    /**
     * @throws \Exception
     */
    public function getCoveringShade($properties): string|null
    {
        if (count($properties['coveringType']) === 2) {
            if (in_array(CoveringTypeListEnum::OXIDATION->value, $properties['coveringType'])) {
                return CoveringShadeListEnum::BLACKENING->value;
            }

            return CoveringShadeListEnum::RHODIUM_LIGHT_GRAY->value;
        } elseif (count($properties['coveringType']) === 1) {
            if ($properties['coveringType'][0] === CoveringTypeListEnum::PARTLY_RHODIUM_PLATING->value) {
                $arr = explode(',', CoveringTypeListEnum::PARTLY_RHODIUM_PLATING->shades());
                $key = array_rand($arr);
                return $arr[$key];
            } elseif ($properties['coveringType'][0] === CoveringTypeListEnum::PLATINIZING->value) {
                $arr = explode(',', CoveringTypeListEnum::PLATINIZING->shades());
                $key = array_rand($arr);
                return $arr[$key];
            } elseif ($properties['coveringType'][0] === CoveringTypeListEnum::RHODIUM_PLATING->value) {
                $arr = explode(',', CoveringTypeListEnum::RHODIUM_PLATING->shades());
                $key = array_rand($arr);
                return $arr[$key];
            } elseif ($properties['coveringType'][0] === CoveringTypeListEnum::OXIDATION->value) {
                $arr = explode(',', CoveringTypeListEnum::OXIDATION->shades());
                $key = array_rand($arr);
                return $arr[$key];
            } elseif ($properties['coveringType'][0] === CoveringTypeListEnum::GOLDING->value) {
                $arr = explode(',', CoveringTypeListEnum::GOLDING->shades());
                $key = array_rand($arr);
                return $arr[$key];
            } elseif ($properties['coveringType'][0] === CoveringTypeListEnum::PARTLY_GOLDING->value) {
                $arr = explode(',', CoveringTypeListEnum::PARTLY_GOLDING->shades());
                $key = array_rand($arr);
                return $arr[$key];
            } elseif ($properties['coveringType'][0] === CoveringTypeListEnum::DIAMOND_CUT->value) {
                $arr = explode(',', CoveringTypeListEnum::DIAMOND_CUT->shades());
                $key = array_rand($arr);
                return $arr[$key];
            } elseif ($properties['coveringType'][0] === CoveringTypeListEnum::ENAMEL->value) {
                $arr = explode(',', CoveringTypeListEnum::ENAMEL->shades());
                $key = array_rand($arr);
                return $arr[$key];
            }
            return CoveringShadeListEnum::BLACKENING->value;
        }

        return null;
    }
}