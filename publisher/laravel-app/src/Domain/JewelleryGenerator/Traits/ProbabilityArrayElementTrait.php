<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Traits;

use Domain\JewelleryGenerator\JewelleryBuilderInterface;

trait ProbabilityArrayElementTrait
{
    public function getArrElement(string $enumClass, array $enumCases): string
    {
        return $this->randWithEntries($enumClass, $enumCases);
    }

    private function randWithEntries(string $enumClass, array $enumCases)
    {
        $tmp = [];

        //loop through all names
        foreach($this->getArrItems($enumClass, $enumCases) as $name => $count) {
            //for each entry for a specific name, add name to `$tmp` array
            for ($x = 1; $x <= $count * 100; $x++) {
                $tmp[] = $name;
            }
        }

        return $tmp[array_rand($tmp)];
    }

    protected function getArrItems(string $enumClass, array $enumCases): array
    {
        $arrItems = [];
        foreach ($enumCases as $item) {
            $arrItems[$enumClass::{$item->name}->value] = $enumClass::{$item->name}->probability();
        }

        return $arrItems;
    }
}