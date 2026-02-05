<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\BeadItems\BeadCabochonForm\Enums\BeadCabochonFormNamesEnum;
use JewelleryDomain\Jewellery\BeadItems\BeadItem\Enums\BeadItemNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\InsertType\Enums\InsertTypeNamesEnum;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneTreatment\Enums\StoneTreatmentNamesEnum;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;

final readonly class InsertItem
{
    use RandomArrayElementWithProbabilityTrait;

    public function __construct(private array $properties)
    {}

    public function getInsertItem(string $insertType, string $formType): string
    {
        if ($insertType === InsertTypeNamesEnum::BEAD_ITEM->value) {

            $enumCases = BeadItemNamesEnum::cases();
            $enumClass = get_class(BeadItemNamesEnum::POLYCHROME_TOURMALINE);

            return $this->getArrElement($enumCases, $enumClass);

        } else if ($insertType === InsertTypeNamesEnum::STONE->value) {

            $stones = JewelleryCategoryNamesEnum::BRACELETS->stones();

            return $stones[array_rand($stones)];
        } else {
            return 'error: invalid insert type';
        }
    }

}
