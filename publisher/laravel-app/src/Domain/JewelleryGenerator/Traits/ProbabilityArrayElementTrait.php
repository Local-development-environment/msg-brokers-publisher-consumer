<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Traits;

use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;

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

    protected function getInsertQuantity(array $insert, int $keyInsert): int
    {
        if ($keyInsert === 0) {
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
        } elseif ($keyInsert === 1) {
            return rand(10, 20);
        } elseif ($keyInsert === 2) {
            return rand(20, 30);
        } else {
            return rand(30, 40);
        }
    }

    protected function getInsertWeight(array $insert, int $keyInsert): array
    {
        $middle = config('data-seed.insert-seed.stones.carat.middle');
        $small  = config('data-seed.insert-seed.stones.carat.small');
        $large  = config('data-seed.insert-seed.stones.carat.large');
        $stoneMetrics = data_get(config('data-seed.insert-seed.stones.carat'), '*.*');

        if ($keyInsert === 0) {
            if ($insert['stoneGroup'] === StoneGroupBuilderEnum::PRECIOUS->value) {

                if ($insert['quantity'] === 1) {
                    $filteredItems = array_filter($stoneMetrics, function ($value) {
                        return $value['carat'] >= 0.5 && $value['carat'] <= 0.9;
                    });
                } else {
                    $filteredItems = array_filter($stoneMetrics, function ($value) {
                        return $value['carat'] >= 0.3 && $value['carat'] <= 0.5;
                    });
                }

                $insert['metrics'] = $filteredItems[array_rand($filteredItems)];

            } elseif ($insert['stoneGroup'] === StoneGroupBuilderEnum::JEWELLERIES->value) {

                if ($insert['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value) {

                    if ($insert['quantity'] === 1) {
                        $filteredItems = array_filter($stoneMetrics, function ($value) {
                            return $value['carat'] >= 0.5 && $value['carat'] <= 0.9;
                        });
                    } else {
                        $filteredItems = array_filter($stoneMetrics, function ($value) {
                            return $value['carat'] >= 0.3 && $value['carat'] <= 0.5;
                        });
                    }

                    $insert['metrics'] = $filteredItems[array_rand($filteredItems)];

                }

                if ($insert['stoneGrade'] === StoneGradeBuilderEnum::SECOND_GRADE->value ||
                    $insert['stoneGrade'] === StoneGradeBuilderEnum::THIRD_GRADE->value ||
                    $insert['stoneGrade'] === StoneGradeBuilderEnum::FORTH_GRADE->value) {

                    if ($insert['quantity'] === 1) {
                        $filteredItems = array_filter($stoneMetrics, function ($value) {
                            return $value['carat'] >= 0.7 && $value['carat'] <= 2;
                        });
                    } else {
                        $filteredItems = array_filter($stoneMetrics, function ($value) {
                            return $value['carat'] >= 1 && $value['carat'] <= 5;
                        });
                    }

                    $insert['metrics'] = $filteredItems[array_rand($filteredItems)];

                }

            } else {

                $insert['metrics'] = $small[array_rand($small)];

            }

            $insert['dimensions'] = $this->getInsertDimensions($insert)['dimensions'];
            $insert['weight']     = $insert['metrics']['carat'];

            return $insert;

        } elseif ($keyInsert === 1) {

            $insert['metrics'] = $small[array_rand($small)];

            $insert['dimensions'] = $this->getInsertDimensions($insert)['dimensions'];

            $insert['weight'] = $insert['metrics']['carat'];

            return $insert;
        }

        return [];
    }

    protected function getInsertDimensions(array $insert): array
    {
        if ($insert['facets'] === FacetBuilderEnum::ROUND_CUT->value ||
            $insert['facets'] === FacetBuilderEnum::CABOCHON_ROUND->value) {

                $insert['dimensions'] = ['diameter' => $insert['metrics']['diameter']];

        } else {

            $insert['dimensions'] = [
                'height' => $insert['metrics']['diameter'],
                'width' => round($insert['metrics']['diameter'] * 0.75, 2),
            ];

        }

        return $insert;
    }

    protected function prepareInsert(array $insert, int $keyInsert): array
    {
        $insert['facets']     = $this->getArrElement($insert['facets']);
        $insert['colours']    = $this->getArrElement($insert['colours']);
        $insert['quantity']   = $this->getInsertQuantity($insert, $keyInsert);

        $metrics = $this->getInsertWeight($insert, $keyInsert);

        $insert['weight']     = $metrics['weight'];
        $insert['dimensions'] = $metrics['dimensions'];

        return $insert;
    }
}