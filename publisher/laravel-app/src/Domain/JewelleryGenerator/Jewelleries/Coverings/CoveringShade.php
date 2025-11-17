<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Coverings;

use Domain\Coverings\CoveringShades\Enums\CoveringShadeBuilderEnum;
use Domain\Coverings\CoveringTypes\Enums\CoveringTypeBuilderEnum;

final class CoveringShade
{
    /**
     * @throws \Exception
     */
    public function getCoveringShade($properties): string|null
    {
        dump($properties);
//        if (count($properties['coveringType']) === 2) {
//            if (in_array(CoveringTypeBuilderEnum::OXIDATION->value, $properties['coveringType'])) {
//                return CoveringShadeBuilderEnum::BLACKENING->value;
//            }
//
//            return CoveringShadeBuilderEnum::RHODIUM_LIGHT_GRAY->value;
//        } elseif (count($properties['coveringType']) === 1) {
//            if ($properties['coveringType'][0] === CoveringTypeBuilderEnum::PARTLY_RHODIUM_PLATING->value) {
//                $arr = explode(',', CoveringTypeBuilderEnum::PARTLY_RHODIUM_PLATING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoveringTypeBuilderEnum::PLATINIZING->value) {
//                $arr = explode(',', CoveringTypeBuilderEnum::PLATINIZING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoveringTypeBuilderEnum::RHODIUM_PLATING->value) {
//                $arr = explode(',', CoveringTypeBuilderEnum::RHODIUM_PLATING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoveringTypeBuilderEnum::OXIDATION->value) {
//                $arr = explode(',', CoveringTypeBuilderEnum::OXIDATION->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoveringTypeBuilderEnum::GOLDING->value) {
//                $arr = explode(',', CoveringTypeBuilderEnum::GOLDING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoveringTypeBuilderEnum::PARTLY_GOLDING->value) {
//                $arr = explode(',', CoveringTypeBuilderEnum::PARTLY_GOLDING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoveringTypeBuilderEnum::DIAMOND_CUT->value) {
//                $arr = explode(',', CoveringTypeBuilderEnum::DIAMOND_CUT->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoveringTypeBuilderEnum::ENAMEL->value) {
//                $arr = explode(',', CoveringTypeBuilderEnum::ENAMEL->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            }
//            return CoveringShadeBuilderEnum::BLACKENING->value;
//        }

        return null;
    }
}