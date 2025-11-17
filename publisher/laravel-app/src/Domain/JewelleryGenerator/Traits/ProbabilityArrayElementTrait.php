<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Traits;

trait ProbabilityArrayElementTrait
{
    public function getArrElement(string $enumClass, array $enumCases): string|int|null
    {
        return $this->randWithEntries($enumClass, $enumCases);
    }

    private function randWithEntries(string $enumClass, array $enumCases)
    {
        $tmp = [];

        //loop through all names
        foreach($this->getArrItems($enumClass, $enumCases) as $name => $count) {
            //for each entry for a specific name, add name to `$tmp` array

            for ($x = 1; $x <= $count; $x++) {
                $tmp[] = $name;
            }
        }

        return count($tmp) ? $tmp[array_rand($tmp)] : null;
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