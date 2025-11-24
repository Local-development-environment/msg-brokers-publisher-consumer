<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Illuminate\Support\Facades\DB;

final class InsertItem
{
    public function insertItem(string $category): array
    {
        $randNum = rand(1, 5);

        if ($category === CategoryBuilderEnum::CHAINS->value || $randNum === 1) {
            return [];
        } elseif ($randNum === 2) {
            return ['first insert', 'second insert'];
        } elseif ($randNum === 3) {
            return ['first insert', 'second insert', 'third insert'];
        } else {
            $insert = $this->oneInsert();
            return [[
                'stone_id' => $insert->id,
                'stone'    => $insert->stone,
                'group'    => $insert->group,
                'origin'   => $insert->origin,
                'quantity' => $insert->quantity,
            ]];
        }
    }

    private function oneInsert(): null|object
    {
        $randGroup = rand(1, 10);

        if ($randGroup >= 1 && $randGroup <= 4) {
            return $this->sqlInsertItem(1);
        } elseif ($randGroup >= 4 && $randGroup <= 8) {
            return $this->sqlInsertItem(2);
        } elseif ($randGroup >= 8 && $randGroup <= 9) {
            return $this->sqlInsertItem(3);
        } else {
            return $this->sqlInsertItem(4);
        }
    }

    private function twoInsert(): null|object
    {
        $randGroup = rand(1, 10);

//        if ($randGroup >= 1 && $randGroup <= 4) {
//            return $this->sqlInsertItem(1);
//        } elseif ($randGroup >= 4 && $randGroup <= 8) {
//            return $this->sqlInsertItem(2);
//        } elseif ($randGroup >= 8 && $randGroup <= 9) {
//            return $this->sqlInsertItem(3);
//        } else {
//            return $this->sqlInsertItem(4);
//        }
    }

    private function sqlInsertItem(int $group_id): null|object
    {
        return DB::table(StoneEnum::TABLE_NAME->value)
            ->join('jw_inserts.type_origins', 'jw_inserts.stones.type_origin_id', '=', 'jw_inserts.type_origins.id')
            ->join('jw_inserts.natural_stones','jw_inserts.stones.id', '=', 'jw_inserts.natural_stones.id')
            ->join('jw_inserts.group_grades','jw_inserts.natural_stones.id', '=', 'jw_inserts.group_grades.id')
            ->join('jw_inserts.stone_groups','jw_inserts.group_grades.stone_group_id', '=', 'jw_inserts.stone_groups.id')
            ->select(
                'jw_inserts.stones.id',
                'jw_inserts.stones.name as stone',
                'jw_inserts.stone_groups.name as group',
                'jw_inserts.type_origins.name as origin',
            )
            ->where('jw_inserts.stone_groups.id', '=', $group_id)
            ->inRandomOrder()->first();
    }
}