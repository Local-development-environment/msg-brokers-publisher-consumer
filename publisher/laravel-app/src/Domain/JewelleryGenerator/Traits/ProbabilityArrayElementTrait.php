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
            $rand = rand(1, 100);
            if ($rand < 25) {
                return rand(10, 20);
            } elseif ($rand < 50) {
                return rand(20, 30);
            } elseif ($rand < 75) {
                return rand(30, 40);
            } else {
                return rand(40, 60);
            }
        } elseif ($keyInsert === 2) {
            $rand = rand(1, 100);
            if ($rand < 30) {
                return rand(20, 30);
            } elseif ($rand < 60) {
                return rand(30, 40);
            } else {
                return rand(40, 60);
            }
        } else {
            $rand = rand(1, 100);
            if ($rand < 50) {
                return rand(30, 40);
            } else {
                return rand(40, 60);
            }
        }
    }

    protected function getInsertWeight(array $insert, int $keyInsert): array
    {
        $stoneMetrics = data_get(config('data-seed.insert-seed.stones.carat'), '*.*');

        if ($keyInsert === 0) {
            if ($insert['stoneGroup'] === StoneGroupBuilderEnum::PRECIOUS->value) {

                $insert = $this->getInsert0309($insert, $stoneMetrics);

            } elseif ($insert['stoneGroup'] === StoneGroupBuilderEnum::JEWELLERIES->value) {

                if ($insert['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value) {

                    $insert = $this->getInsert0309($insert, $stoneMetrics);

                }

                if ($insert['stoneGrade'] === StoneGradeBuilderEnum::SECOND_GRADE->value ||
                    $insert['stoneGrade'] === StoneGradeBuilderEnum::THIRD_GRADE->value ||
                    $insert['stoneGrade'] === StoneGradeBuilderEnum::FORTH_GRADE->value) {

                    $insert = $this->getInsert0750($insert, $stoneMetrics);

                }

            } else {

                $insert = $this->getInsert0750($insert, $stoneMetrics);

            }

            $insert['dimensions'] = $this->getInsertDimensions($insert)['dimensions'];
            $insert['weight']     = $insert['metrics']['carat'];

            return $insert;

        } elseif ($keyInsert === 1) {
//            dd($insert);
            if ($insert['quantity'] >= 10 && $insert['quantity'] <= 20) {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.1 && $value['carat'] <= 0.2;
                });

            } elseif ($insert['quantity'] >= 20 && $insert['quantity'] <= 30) {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.06 && $value['carat'] <= 0.09;
                });

            } elseif ($insert['quantity'] >= 30 && $insert['quantity'] <= 40) {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.01 && $value['carat'] <= 0.06;
                });

            } else {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.0045 && $value['carat'] <= 0.009;
                });

            }

            $insert['metrics'] = $filteredItems[array_rand($filteredItems)];

            $insert['dimensions'] = $this->getInsertDimensions($insert)['dimensions'];
            $insert['weight']     = $insert['metrics']['carat'];

            return $insert;
        } elseif ($keyInsert === 2) {

            if ($insert['quantity'] >= 20 && $insert['quantity'] <= 30) {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.06 && $value['carat'] <= 0.09;
                });

            } elseif ($insert['quantity'] >= 30 && $insert['quantity'] <= 40) {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.01 && $value['carat'] <= 0.06;
                });

            } else {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.0045 && $value['carat'] <= 0.009;
                });

            }

            $insert['metrics'] = $filteredItems[array_rand($filteredItems)];

            $insert['dimensions'] = $this->getInsertDimensions($insert)['dimensions'];
            $insert['weight']     = $insert['metrics']['carat'];

            return $insert;

        } else {

            if ($insert['quantity'] >= 30 && $insert['quantity'] <= 40) {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.01 && $value['carat'] <= 0.06;
                });

            } else {

                $filteredItems = array_filter($stoneMetrics, function ($value) {
                    return $value['carat'] >= 0.0045 && $value['carat'] <= 0.009;
                });

            }

            $insert['metrics'] = $filteredItems[array_rand($filteredItems)];

            $insert['dimensions'] = $this->getInsertDimensions($insert)['dimensions'];
            $insert['weight']     = $insert['metrics']['carat'];

            return $insert;

        }
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

    /**
     * @param array $insert
     * @param mixed $stoneMetrics
     * @return array
     */
    protected function getInsert0750(array $insert, mixed $stoneMetrics): array
    {
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
        return $insert;
    }

    /**
     * @param array $insert
     * @param mixed $stoneMetrics
     * @return array
     */
    protected function getInsert0309(array $insert, mixed $stoneMetrics): array
    {
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
        return $insert;
    }
}