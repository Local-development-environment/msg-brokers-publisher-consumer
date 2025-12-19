<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Traits;

use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\StoneGroups\Models\StoneGroup;

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
        foreach ($arrItems as $name => $count) {
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

    protected function getFirstInsertQuantity(): int
    {
        $rand = rand(1, 100);

        if ($rand < 5) {
            return 5;
        } elseif ($rand < 10) {
            return 4;
        } elseif ($rand < 20) {
            return 3;
        } elseif ($rand < 30) {
            return 2;
        } else {
            return 1;
        }
    }

    protected function getSecondInsertQuantity(): int
    {
        return rand(10, 20);
    }

    protected function getInsertQuantity(array $insert, int $numInsert): int
    {
        if ($numInsert === 0) {
            $rand = rand(1, 100);

            if ($rand < 5) {
                return 5;
            } elseif ($rand < 10) {
                return 4;
            } elseif ($rand < 20) {
                return 3;
            } elseif ($rand < 30) {
                return 2;
            } else {
                return 1;
            }
        } elseif ($numInsert === 1) {
            return rand(10, 20);
        } elseif ($numInsert === 2) {
            return rand(20, 30);
        } else {
            return rand(30, 40);
        }
    }

    protected function getInsertWeight(array $insert, int $keyInsert): float
    {
        $middle = config('data-seed.insert-seed.stones.carat.middle');
        $small  = config('data-seed.insert-seed.stones.carat.small');
        $large  = config('data-seed.insert-seed.stones.carat.large');

        if ($keyInsert === 0) {
            if ($insert['stoneGroup'] === StoneGroupBuilderEnum::PRECIOUS->value) {
                return $middle[array_rand($middle)]['carat'];
            } elseif ($insert['stoneGroup'] === StoneGroupBuilderEnum::JEWELLERIES->value) {
                return $large[array_rand($large)]['carat'];
            }
        } elseif ($keyInsert === 1) {
            return $small[array_rand($small)]['carat'];
        }

        return 0.0;
    }

    protected function getInsertDimensions(array $insert, int $keyInsert): array
    {
        $middle = config('data-seed.insert-seed.stones.carat.middle');
        $small  = config('data-seed.insert-seed.stones.carat.small');
        $large  = config('data-seed.insert-seed.stones.carat.large');

        return $small[array_rand($small)];
    }

    protected function prepareInsert(array $insert, int $keyInsert): array
    {
        $insert['facets']     = $this->getArrElement($insert['facets']);
        $insert['colours']    = $this->getArrElement($insert['colours']);
        $insert['quantity']   = $this->getInsertQuantity($insert, $keyInsert);
        $insert['weight']     = $this->getInsertWeight($insert, $keyInsert);
        $insert['dimensions'] = $this->getInsertDimensions($insert, $keyInsert);

        return $insert;
    }
}