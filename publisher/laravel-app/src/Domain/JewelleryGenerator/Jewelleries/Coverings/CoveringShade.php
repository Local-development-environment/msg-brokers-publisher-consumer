<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Coverings;

final class CoveringShade
{
    /**
     * @throws \Exception
     */
    public function getCoveringShade($properties): string|null
    {
        dump($properties);
//        if (count($properties['coveringType']) === 2) {
//            if (in_array(CoverageBuilderEnum::OXIDATION->value, $properties['coveringType'])) {
//                return CoveringShadeBuilderEnum::BLACKENING->value;
//            }
//
//            return CoveringShadeBuilderEnum::RHODIUM_LIGHT_GRAY->value;
//        } elseif (count($properties['coveringType']) === 1) {
//            if ($properties['coveringType'][0] === CoverageBuilderEnum::PARTLY_RHODIUM_PLATING->value) {
//                $arr = explode(',', CoverageBuilderEnum::PARTLY_RHODIUM_PLATING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoverageBuilderEnum::PLATINIZING->value) {
//                $arr = explode(',', CoverageBuilderEnum::PLATINIZING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoverageBuilderEnum::RHODIUM_PLATING->value) {
//                $arr = explode(',', CoverageBuilderEnum::RHODIUM_PLATING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoverageBuilderEnum::OXIDATION->value) {
//                $arr = explode(',', CoverageBuilderEnum::OXIDATION->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoverageBuilderEnum::GOLDING->value) {
//                $arr = explode(',', CoverageBuilderEnum::GOLDING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoverageBuilderEnum::PARTLY_GOLDING->value) {
//                $arr = explode(',', CoverageBuilderEnum::PARTLY_GOLDING->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoverageBuilderEnum::DIAMOND_CUT->value) {
//                $arr = explode(',', CoverageBuilderEnum::DIAMOND_CUT->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            } elseif ($properties['coveringType'][0] === CoverageBuilderEnum::ENAMEL->value) {
//                $arr = explode(',', CoverageBuilderEnum::ENAMEL->shades());
//                $key = array_rand($arr);
//                return $arr[$key];
//            }
//            return CoveringShadeBuilderEnum::BLACKENING->value;
//        }

        return null;
    }
}