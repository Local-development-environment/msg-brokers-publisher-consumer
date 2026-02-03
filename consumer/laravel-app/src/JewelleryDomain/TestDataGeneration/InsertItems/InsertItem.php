<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\BeadItems\BeadItem\Enums\BeadItemNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\InsertType\Enums\InsertTypeNamesEnum;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;

final readonly class InsertItem
{
    use RandomArrayElementWithProbabilityTrait;

    public function __construct(private array $properties)
    {}

    public function getInsertItem(string $insertType): array
    {
        if ($insertType === InsertTypeNamesEnum::BEAD_ITEM->value) {

            $enumCases = BeadItemNamesEnum::cases();
            $enumClass = get_class(BeadItemNamesEnum::POLYCHROME_TOURMALINE);

            return [$insertType => $this->getArrElement($enumCases, $enumClass)];

        } else if ($insertType === InsertTypeNamesEnum::STONE->value) {

            $stones = JewelleryCategoryNamesEnum::BRACELETS->stones();

            return [$insertType => $stones[array_rand($stones)]];
        } else {
            return ['error' => 'invalid insert type'];
        }
    }
}
