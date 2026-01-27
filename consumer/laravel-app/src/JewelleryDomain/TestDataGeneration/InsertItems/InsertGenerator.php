<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletType\Enums\BraceletTypeNamesEnum;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertRings\InsertRingGenerate;

final class InsertGenerator
{
    public function getInsert(array $properties): array
    {

//        $preciousMetal = data_get($properties, 'preciousMetals.*.preciousMetal');
        $category = data_get($properties, 'jewelleryCategory');
        dump($category);
        return match ($category) {
            JewelleryCategoryNamesEnum::BEADS->value          => $this->beadInserts($properties),
            JewelleryCategoryNamesEnum::BRACELETS->value      => $this->braceletInserts($properties),
            JewelleryCategoryNamesEnum::BROOCHES->value       => $this->broochInserts($properties),
            JewelleryCategoryNamesEnum::CHAINS->value         => $this->chainInserts($properties),
            JewelleryCategoryNamesEnum::CHARM_PENDANTS->value => $this->charmPendantInserts($properties),
            JewelleryCategoryNamesEnum::CUFF_LINKS->value     => $this->cuffLinkInserts($properties),
            JewelleryCategoryNamesEnum::EARRINGS->value       => $this->earringInserts($properties),
            JewelleryCategoryNamesEnum::NECKLACES->value      => $this->necklaceInserts($properties),
            JewelleryCategoryNamesEnum::PENDANTS->value       => $this->pendantInserts($properties),
            JewelleryCategoryNamesEnum::PIERCINGS->value      => $this->piercingInserts($properties),
            JewelleryCategoryNamesEnum::RINGS->value          => $this->ringInserts($properties),
            JewelleryCategoryNamesEnum::TIE_CLIPS->value      => $this->tieClipInserts($properties),
        };
    }

    public function beadInserts(array $properties): array
    {
        return ['Bead always has insert'];
    }

    public function braceletInserts(array $properties): array
    {
        if ($properties['property']['braceletType'] === BraceletTypeNamesEnum::CHAINED->value) {
            return [];
        } else {
            return ['Bracelet has inserts'];
        }
    }

    public function broochInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }

    public function chainInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }

    public function charmPendantInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }

    public function cuffLinkInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }

    public function earringInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }

    public function necklaceInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }

    public function pendantInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }

    public function piercingInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }

    public function ringInserts(array $properties): array
    {
        return (new InsertRingGenerate($properties))->getPInsert();
    }

    public function tieClipInserts(array $properties): array
    {
        dd($properties['property']);
        return $properties;
    }
}
