<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletType\Enums\BraceletTypeNamesEnum;

final class InsertGenerator
{
    public function getInsert(array $properties): array
    {
//        return $this->getInsertItem($properties);
        if ($properties['jewelleryCategory'] === JewelleryCategoryNamesEnum::CHAINS->value) {
            return [];
        } else if ($properties['jewelleryCategory'] === JewelleryCategoryNamesEnum::BRACELETS->value) {
            if ($properties['property']['braceletType'] === BraceletTypeNamesEnum::CHAINED->value) {
                return [];
            } else {
                return $this->insertData($properties);
            }
        } else {
            return $this->insertData($properties);
        }
    }

    private function insertData(array $properties): array
    {
        $insertType = (new InsertType($properties))->getInsertType();
        $formType   = (new FormType())->getFormType();
        $insertItem = (new InsertItem($properties))->getInsertItem(insertType: $insertType, formType: $formType);
//        $formItem   = (new FormItem())->getFormItem(formType: $formType, insertType: $insertType);
        $formItem   = (new FormItem())->getFormItem(insertItem: $insertItem,  insertType: $insertType, formType: $formType);
        $colourItem = (new ColourItem())->getColourItem(insertItem: $insertItem, insertType: $insertType);

        return [
            [
                'insertType' => $insertType,
                'insertItem' => $insertItem,
                'formType'   => $formType,
                'formItem'   => $formItem,
                'colour'     => $colourItem,
//                'quantity' => (new BeadStoneQuantity($properties))->getQuantity($dimensions),
//                'dimensions' => $dimensions
            ]
        ];
    }
}
