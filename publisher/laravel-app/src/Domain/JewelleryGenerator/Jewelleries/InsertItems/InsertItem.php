<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

final class InsertItem
{
    public function insertItem(string $category): array
    {
        $randNum = rand(1, 100);

        if ($category === CategoryBuilderEnum::CHAINS->value || $randNum < 10) {
            return [];
        } elseif ($randNum < 55) {
            $firstStone = $this->getOneInsert();
            return [
                [
                    'stoneName' => $firstStone['stoneName'],
                    'facets' => $firstStone['facets'],
                ]
            ];
        } elseif ($randNum < 85) {
            $firstStone = $this->getManyInsert();
            $secondStone = $this->getManyInsert();
            return [
                [
                    'stoneName' => $firstStone['stoneName'],
                    'facets' => $firstStone['facets'],
                ],
                [
                    'stoneName' => $secondStone['stoneName'],
                    'facets' => $secondStone['facets'],
                ],
            ];
        } elseif ($randNum < 95) {
            $firstStone = $this->getManyInsert();
            $secondStone = $this->getManyInsert();
            $thirdStone = $this->getManyInsert();
            return [
                [
                    'stoneName' => $firstStone['stoneName'],
                    'facets' => $firstStone['facets'],
                ],
                [
                    'stoneName' => $secondStone['stoneName'],
                    'facets' => $secondStone['facets'],
                ],
                [
                    'stoneName' => $thirdStone['stoneName'],
                    'facets' => $thirdStone['facets'],
                ],
            ];
        } else {
            $firstStone = $this->getManyInsert();
            $secondStone = $this->getManyInsert();
            $thirdStone = $this->getManyInsert();
            $forthStone = $this->getManyInsert();
            return [
                [
                    'stoneName' => $firstStone['stoneName'],
                    'facets' => $firstStone['facets'],
                ],
                [
                    'stoneName' => $secondStone['stoneName'],
                    'facets' => $secondStone['facets'],
                ],
                [
                    'stoneName' => $thirdStone['stoneName'],
                    'facets' => $thirdStone['facets'],
                ],
                [
                    'stoneName' => $forthStone['stoneName'],
                    'facets' => $forthStone['facets'],
                ]
            ];
        }
    }

    private function getOneInsert(): array
    {
        $randStone = rand(1, 100);

        if ($randStone < 45) {

            $stones = config('data-seed.insert-seed.stones.precious-stones');

        } elseif ($randStone < 55) {

            $stones = config('data-seed.insert-seed.stones.jewellery-stones');

        } elseif ($randStone < 85) {

            $stones = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');

        } else {

            $stones = config('data-seed.insert-seed.stones.ornamental-stones');

        }

        $key = array_rand($stones);
        return [
            'stoneName' => $stones[$key]['stoneName'],
            'stoneFamily' => $stones[$key]['stoneFamily'],
            'stoneGroup' => $stones[$key]['stoneGroup'],
            'stoneGrade' => $stones[$key]['stoneGrade'],
            'facets'     => Arr::random($stones[$key]['facets']),
        ];
    }

    private function getManyInsert(): array
    {
        $randStone = rand(1, 100);

        if ($randStone < 50) {

            $stones = config('data-seed.insert-seed.stones.precious-stones');

        } else {

            $stones = config('data-seed.insert-seed.stones.jewellery-stones');

        }

        $key = array_rand($stones);
        return [
            'stoneName' => $stones[$key]['stoneName'],
            'stoneFamily' => $stones[$key]['stoneFamily'],
            'stoneGroup' => $stones[$key]['stoneGroup'],
            'stoneGrade' => $stones[$key]['stoneGrade'],
            'facets'     => Arr::random($stones[$key]['facets']),
        ];
    }

    private function getQuantity(string $numberInserts, string $group): int{

    }

    private function sqlInsertItem(int $group_id): null|object
    {
        return DB::table(StoneEnum::TABLE_NAME->value . ' as s')
            ->join('jw_inserts.type_origins as to', 's.type_origin_id', '=', 'to.id')
            ->join('jw_inserts.natural_stones as ns','s.id', '=', 'ns.id')
            ->join('jw_inserts.group_grades as gg', 'ns.id', '=', 'gg.id')
            ->join('jw_inserts.stone_groups as sg', 'gg.stone_group_id', '=', 'sg.id')
            ->select(
                's.id',
                's.name as stone',
                'sg.id as stone_group_id',
                'sg.name as group',
                'to.id as origin_id',
                'to.name as origin',
            )
            ->where('sg.id', '=', $group_id)
            ->inRandomOrder()->first();
    }
}