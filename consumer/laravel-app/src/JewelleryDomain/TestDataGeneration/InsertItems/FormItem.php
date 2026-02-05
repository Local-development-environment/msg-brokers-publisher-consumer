<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\BeadItems\BeadCabochonForm\Enums\BeadCabochonFormNamesEnum;
use JewelleryDomain\Jewellery\BeadItems\BeadCutForm\Enums\BeadCutFormNamesEnum;
use JewelleryDomain\Jewellery\BeadItems\BeadItem\Enums\BeadItemNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\InsertType\Enums\InsertTypeNamesEnum;
use JewelleryDomain\Jewellery\StoneExteriors\StoneCabochonForm\Enums\StoneCabochonFormNamesEnum;
use JewelleryDomain\Jewellery\StoneExteriors\StoneCutForm\Enums\StoneCutFormNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneTreatment\Enums\StoneTreatmentNamesEnum;

final class FormItem
{
    public function __construct()
    {}

    public function getFormItem(string $insertItem, string $insertType, string $formType): string
    {
        if ($insertType === InsertTypeNamesEnum::STONE->value) {

            if ($formType === StoneTreatmentNamesEnum::CABOCHON->value) {
                $formItemKey = array_rand(StoneCabochonFormNamesEnum::cases());

                return StoneCabochonFormNamesEnum::cases()[$formItemKey]->value;
            } else if ($formType === StoneTreatmentNamesEnum::CUT->value) {
                $formItemKey = array_rand(StoneCutFormNamesEnum::cases());

                return StoneCutFormNamesEnum::cases()[$formItemKey]->value;
            } else {
                return 'error';
            }

        } else if ($insertType === InsertTypeNamesEnum::BEAD_ITEM->value) {

            if ($formType === StoneTreatmentNamesEnum::CABOCHON->value) {

                $beadCabochons = BeadItemNamesEnum::from($insertItem)->beadItemCabochon();
                return $this->getRandomForm($beadCabochons);

            } else if ($formType === StoneTreatmentNamesEnum::CUT->value) {

                $beadFacets = BeadItemNamesEnum::from($insertItem)->beadItemCut();
                return $this->getRandomForm($beadFacets);

            } else {
                return 'error';
            }
        } else {
            return 'error';
        }

    }

    private function getRandomForm(array $forms): string
    {
        $arrayProbabilities = [];

        foreach ($forms as $form) {
            for ($i = 0; $i < $form[1]; $i++) {
                $arrayProbabilities[] = $form[0];
            }
        }

        shuffle($arrayProbabilities);

        return $arrayProbabilities[array_rand($arrayProbabilities)];
    }
}
