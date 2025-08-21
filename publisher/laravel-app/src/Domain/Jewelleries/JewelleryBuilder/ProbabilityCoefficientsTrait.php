<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

use Illuminate\Support\Facades\DB;

trait ProbabilityCoefficientsTrait
{
    public function randInsertsAmount(): int
    {
        $tmp = [];

        for ($x = 1; $x <= 40; $x++) {
            $tmp[] = 1;
        }

        for ($x = 1; $x <= 25; $x++) {
            $tmp[] = 0;
        }

        for ($x = 1; $x <= 20; $x++) {
            $tmp[] = 2;
        }

        for ($x = 1; $x <= 10; $x++) {
            $tmp[] = 3;
        }

        for ($x = 1; $x <= 5; $x++) {
            $tmp[] = 4;
        }

        return $tmp[array_rand($tmp)];
    }

    public function randNaturalStone(): int
    {
        $tmp = [];
        $groupIds = [];

        $preciousID = DB::table('jw_inserts.stone_groups')->where('name', 'драгоценные')->first()->id;
        $jewelleryID = DB::table('jw_inserts.stone_groups')->where('name', 'ювелирные')->first()->id;
        $jwOrnamentalID = DB::table('jw_inserts.stone_groups')->where('name', 'ювелирно-поделочные')->first()->id;
//        $ornamentalID = DB::table('jw_inserts.stone_groups')->where('name', 'поделочные')->first()->id;

        for ($x = 1; $x <= 50; $x++) {
            $groupIds[] = $preciousID;
        }
        for ($x = 1; $x <= 30; $x++) {
            $groupIds[] = $jewelleryID;
        }
        for ($x = 1; $x <= 10; $x++) {
            $groupIds[] = $jwOrnamentalID;
        }
//        for ($x = 1; $x <= 10; $x++) {
//            $groupIds[] = $ornamentalID;
//        }

        $randGroupId = $groupIds[array_rand($groupIds)];

        $stoneIds = DB::table('jw_views.v_inserts')->where('stone_group_id', $randGroupId)->pluck('st_id')->toArray();

        return $stoneIds[array_rand($stoneIds)];
    }

    public function randColourStone(string $stone): array
    {
        dump($stone);
        $items = config('data-seed.insert-seed.nature-stones-seed.stones');
        $tmp = [];

        foreach ($items as $item) {
            if ($item['name'] === $stone) {
                foreach ($item['colour'] as $colour) {
                    for ($i = 0; $i < $colour['probability']; $i++) {
                        $tmp[] = $colour['colour'];
                    }
                }
            }
        }
        dump($stone);
        dump($tmp);
        return [
            'id' => DB::table('jw_inserts.colours')->where('name', $tmp[array_rand($tmp)])->first()->id,
            'colour' => $tmp[array_rand($tmp)],
        ];
    }
}
