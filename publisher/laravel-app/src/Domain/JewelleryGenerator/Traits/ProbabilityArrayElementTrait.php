<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Traits;

trait ProbabilityArrayElementTrait
{
    public function getArrElement(array $enumCases, string $enumClass = ''): string|int|null
    {
        return $this->randWithEntries($enumCases, $enumClass);
    }

    private function randWithEntries(array $enumCases, string $enumClass = ''): int|string|null
    {
        $tmp = [];

        $arrItems = $this->getArrItems($enumCases, $enumClass);
//        dump($arrItems);
        //loop through all names
        foreach($arrItems as $name => $count) {
            //for each entry for a specific name, add name to `$tmp` array
            for ($x = 1; $x <= $count; $x++) {
                $tmp[] = $name;
            }
        }

        return count($tmp) ? $tmp[array_rand($tmp)] : null;
    }

    protected function getArrItems(array $enumCases, string $enumClass = ''): array
    {
        $arrItems = [];
        if ($enumClass) {
            foreach ($enumCases as $item) {
                $arrItems[$enumClass::{$item->name}->value] = $enumClass::{$item->name}->jwProbability();
            }
        } else {
            foreach ($enumCases as $case) {
                $arrItems[$case[0]] = $case[1];
            }
        }

        return $arrItems;
    }
}