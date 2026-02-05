<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\InsertItems\InsertType\Enums\InsertTypeNamesEnum;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;

final readonly class InsertType
{
    public function __construct(private array $properties)
    {
    }

    public function getInsertType(): string
    {
        $category = $this->properties['jewelleryCategory'];

        return match ($category) {
            JewelleryCategoryNamesEnum::BEADS->value          => $this->getBeadInsertType(),
            JewelleryCategoryNamesEnum::BRACELETS->value      => $this->getBraceletInsertType(),
            JewelleryCategoryNamesEnum::BROOCHES->value       => $this->getBroochInsertType(),
            JewelleryCategoryNamesEnum::CHAINS->value         => $this->getChainInsertType(),
            JewelleryCategoryNamesEnum::CHARM_PENDANTS->value => '$this->charmPendantInserts($properties)',
            JewelleryCategoryNamesEnum::CUFF_LINKS->value     => '$this->cuffLinkInserts($properties)',
            JewelleryCategoryNamesEnum::EARRINGS->value       => '$this->earringInserts($properties)',
            JewelleryCategoryNamesEnum::NECKLACES->value      => '$this->necklaceInserts($properties)',
            JewelleryCategoryNamesEnum::PENDANTS->value       => '$this->pendantInserts($properties)',
            JewelleryCategoryNamesEnum::PIERCINGS->value      => '$this->piercingInserts($properties)',
            JewelleryCategoryNamesEnum::RINGS->value          => '$this->ringInserts($properties)',
            JewelleryCategoryNamesEnum::TIE_CLIPS->value      => '$this->tieClipInserts($properties)',
        };
    }

    private function getBeadInsertType(): string
    {
        if ($this->properties["jewelleryCategory"] === JewelleryCategoryNamesEnum::BEADS->value) {
            return InsertTypeNamesEnum::BEAD_ITEM->value;
        } else if ($this->properties["jewelleryCategory"] === JewelleryCategoryNamesEnum::NECKLACES->value) {
            $num = rand(1, 20);
            if ($num === 1) {
                return InsertTypeNamesEnum::BEAD_ITEM->value;
            } else {
                return InsertTypeNamesEnum::STONE->value;
            }
        } else {
            return InsertTypeNamesEnum::STONE->value;
        }
    }

    private function getBraceletInsertType(): string
    {
        return InsertTypeNamesEnum::STONE->value;
    }

    private function getBroochInsertType(): string
    {
        if ($this->properties["jewelleryCategory"] === JewelleryCategoryNamesEnum::BEADS->value) {
            return InsertTypeNamesEnum::BEAD_ITEM->value;
        } else if ($this->properties["jewelleryCategory"] === JewelleryCategoryNamesEnum::NECKLACES->value) {
            $num = rand(1, 20);
            if ($num === 1) {
                return InsertTypeNamesEnum::BEAD_ITEM->value;
            } else {
                return InsertTypeNamesEnum::STONE->value;
            }
        } else {
            return InsertTypeNamesEnum::STONE->value;
        }
    }

    private function getChainInsertType(): string
    {
        return InsertTypeNamesEnum::STONE->value;
    }
}
