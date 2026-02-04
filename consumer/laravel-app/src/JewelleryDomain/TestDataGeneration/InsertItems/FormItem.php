<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\BeadItems\BeadCabochonForm\Enums\BeadCabochonFormNamesEnum;
use JewelleryDomain\Jewellery\BeadItems\BeadCutForm\Enums\BeadCutFormNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\InsertType\Enums\InsertTypeNamesEnum;
use JewelleryDomain\Jewellery\StoneExteriors\StoneCabochonForm\Enums\StoneCabochonFormNamesEnum;
use JewelleryDomain\Jewellery\StoneExteriors\StoneCutForm\Enums\StoneCutFormNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneTreatment\Enums\StoneTreatmentNamesEnum;

final class FormItem
{
    public function __construct(private array $insertItem)
    {}

    public function getFormItem(string $formType): string
    {
        if (key($this->insertItem) === InsertTypeNamesEnum::STONE->value) {
            if ($formType === StoneTreatmentNamesEnum::CABOCHON->value) {
                $formItemKey = array_rand(StoneCabochonFormNamesEnum::cases());
                return StoneCabochonFormNamesEnum::cases()[$formItemKey]->value;
            } else if ($formType === StoneTreatmentNamesEnum::FACET->value) {
                $formItemKey = array_rand(StoneCutFormNamesEnum::cases());
                return StoneCutFormNamesEnum::cases()[$formItemKey]->value;
            } else {
                return 'error';
            }
        } else if (key($this->insertItem) === InsertTypeNamesEnum::BEAD_ITEM->value) {
            if ($formType === StoneTreatmentNamesEnum::CABOCHON->value) {
                $formItemKey = array_rand(BeadCabochonFormNamesEnum::cases());
                return BeadCabochonFormNamesEnum::cases()[$formItemKey]->value;
            } else if ($formType === StoneTreatmentNamesEnum::FACET->value) {
                $formItemKey = array_rand(BeadCutFormNamesEnum::cases());
                return BeadCutFormNamesEnum::cases()[$formItemKey]->value;
            } else {
                return 'error';
            }
        } else {
            return 'error';
        }

    }
}
