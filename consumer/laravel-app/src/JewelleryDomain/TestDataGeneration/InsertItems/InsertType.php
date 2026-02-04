<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\InsertItems\InsertType\Enums\InsertTypeNamesEnum;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;

final readonly class InsertType
{
    public function __construct(private array $properties)
    {}

    public function getInsertType(): string
    {
        $category = $this->properties['jewelleryCategory'];

        return match ($category) {
            JewelleryCategoryNamesEnum::BEADS->value => $this->getBeadInsertType(),
            JewelleryCategoryNamesEnum::BRACELETS->value => $this->getBraceletInsertType(),
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
}
