<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBead\BeadStoneColour;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBead\BeadStoneDimensions;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBead\BeadStoneForm;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBead\BeadStoneQuantity;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBead\BeadStone;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet\BraceletStone;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet\BraceletStoneColour;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet\BraceletStoneDimensions;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet\BraceletStoneForm;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet\BraceletStoneQuantity;
use Random\RandomException;

final class InsertGenerator
{
    /**
     * @throws RandomException
     */
    public function getInsert(array $properties): array
    {
        $category = data_get($properties, 'jewelleryCategory');
//        dump($category);
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
        $stone = (new BeadStone($properties))->getStone();
        $form = (new BeadStoneForm($properties))->getForm($stone);
        $dimensions = (new BeadStoneDimensions())->getDimensions($form);

        return [
            [
                'stone' => $stone,
                'form' => $form,
                'colour' => (new BeadStoneColour($properties))->getColour($stone),
                'quantity' => (new BeadStoneQuantity($properties))->getQuantity($dimensions),
                'dimensions' => $dimensions
            ]
        ];
    }

    public function braceletInserts(array $properties): array
    {
        $stone = (new BraceletStone($properties))->getStone();
        $color = (new BraceletStoneColour($properties))->getColour($stone);
        $form = (new BraceletStoneForm($properties))->getForm($stone);
        $dimensions = (new BraceletStoneDimensions())->getDimensions($form);

        return [[
            'stone' => $stone,
            'form' => $form,
            'colour' => $color,
            'quantity' => (new BraceletStoneQuantity($properties))->getQuantity($dimensions),
            'dimensions' => $dimensions
        ]];
    }

    public function broochInserts(array $properties): array
    {
        return [];
    }

    public function chainInserts(array $properties): array
    {
        return [];
    }

    public function charmPendantInserts(array $properties): array
    {
        return [];
    }

    public function cuffLinkInserts(array $properties): array
    {
        return [];
    }

    public function earringInserts(array $properties): array
    {
        return [];
    }

    public function necklaceInserts(array $properties): array
    {
        return [];
    }

    public function pendantInserts(array $properties): array
    {
        return [];
    }

    public function piercingInserts(array $properties): array
    {
        return [];
    }

    public function ringInserts(array $properties): array
    {
        return [];
    }

    public function tieClipInserts(array $properties): array
    {
        return [];
    }
}
