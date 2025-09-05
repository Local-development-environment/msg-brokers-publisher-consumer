<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

trait ProbabilityCoefficientsTrait
{
    public function randInsertsAmount(): int
    {
        $tmp = [];

        for ($x = 1; $x <= 40; $x++) {
            $tmp[] = 1;
        }

        for ($x = 1; $x <= 20; $x++) {
            $tmp[] = 0;
        }

        for ($x = 1; $x <= 30; $x++) {
            $tmp[] = 2;
        }

        for ($x = 1; $x <= 7; $x++) {
            $tmp[] = 3;
        }

        for ($x = 1; $x <= 3; $x++) {
            $tmp[] = 4;
        }

        return $tmp[array_rand($tmp)];
    }

    public function randNaturalStone(): int
    {
        $stones = DB::table('jw_inserts.stones AS s')
            ->select(
                's.id as id',
                's.name as stone',
                't.id as type_id',
                't.name as type',
                'sg.id as group_id',
                'sg.name as group_name'
            )
            ->leftJoin('jw_inserts.natural_stones AS ns', 'ns.stone_id', '=', 's.id')
            ->leftJoin('jw_inserts.stone_groups AS sg', 'sg.id', '=', 'ns.stone_group_id')
            ->leftJoin('jw_inserts.grown_stones AS gs', 'gs.stone_id', '=', 's.id')
//            ->leftJoin('jw_inserts.stone_families AS sf', 'sf.id', '=', 'gs.stone_id')
            ->leftJoin('jw_inserts.imitation_stones AS is', 'is.stone_id', '=', 's.id')
            ->join('jw_inserts.type_origins AS t', 't.id', '=', 's.type_origin_id')
            ->orderBy('s.id')
//            ->get()
        ;

        $stones = DB::table('jw_inserts.stones AS s')
            ->select(
                's.id as id',
                's.name as stone',
                't.id as type_id',
                't.name as type',
                'sg.id as group_id',
                'sg.name as group_name'
            )
            ->leftJoin('jw_inserts.natural_stones AS ns', 'ns.stone_id', '=', 's.id')
            ->leftJoin('jw_inserts.stone_groups AS sg', 'sg.id', '=', 'ns.stone_group_id')
            ->leftJoin('jw_inserts.grown_stones AS gs', 'gs.stone_id', '=', 's.id')
//            ->leftJoin('jw_inserts.stone_families AS sf', 'sf.id', '=', 'gs.stone_id')
            ->leftJoin('jw_inserts.imitation_stones AS is', 'is.stone_id', '=', 's.id')
            ->join('jw_inserts.type_origins AS t', 't.id', '=', 's.type_origin_id')
            ->orderBy('s.id')
            ->get()
        ;
//        dd($stones->where('id', '>', 1)->toArray());

        $groupIds = [];

        $preciousID = DB::table('jw_inserts.stone_groups')->where('name', 'драгоценные')->first()->id;
        $jewelleryID = DB::table('jw_inserts.stone_groups')->where('name', 'ювелирные')->first()->id;
        $jwOrnamentalID = DB::table('jw_inserts.stone_groups')->where('name', 'ювелирно-поделочные')->first()->id;
//        $ornamentalID = DB::table('jw_inserts.stone_groups')->where('name', 'поделочные')->first()->id;

        for ($x = 1; $x <= 55; $x++) {
            $groupIds[] = $stones->where('group_id', $preciousID)->pluck('id')->toArray();
        }

        for ($x = 1; $x <= 20; $x++) {
            $groupIds[] = $stones->where('group_id', $jewelleryID)->pluck('id')->toArray();
        }

        for ($x = 1; $x <= 5; $x++) {
            $groupIds[] = $stones->where('group_id', $jwOrnamentalID)->pluck('id')->toArray();
        }

        for ($x = 1; $x <= 15; $x++) {
            $groupIds[] = $stones->whereNull('group_id')->pluck('id')->toArray();
        }

        $arrayIds = Arr::flatten($groupIds);
//        dd($arrayIds[array_rand($arrayIds)]);
        return $arrayIds[array_rand($arrayIds)];

//        $tmp = [];
//        $groupIds = [];
//
//        $preciousID = DB::table('jw_inserts.stone_groups')->where('name', 'драгоценные')->first()->id;
//        $jewelleryID = DB::table('jw_inserts.stone_groups')->where('name', 'ювелирные')->first()->id;
//        $jwOrnamentalID = DB::table('jw_inserts.stone_groups')->where('name', 'ювелирно-поделочные')->first()->id;
////        $ornamentalID = DB::table('jw_inserts.stone_groups')->where('name', 'поделочные')->first()->id;
////        $syntheticID = DB::table('jw_inserts.type_origins')->where('name','имитация')->first()->id;
//
//        for ($x = 1; $x <= 55; $x++) {
//            $groupIds[] = $preciousID;
//        }
//
//        for ($x = 1; $x <= 30; $x++) {
//            $groupIds[] = $jewelleryID;
//        }
//
//        for ($x = 1; $x <= 10; $x++) {
//            $groupIds[] = $jwOrnamentalID;
//        }
//
//
//
////        for ($x = 1; $x <= 5; $x++) {
////            $groupIds[] = $ornamentalID;
////        }
//
//        $randGroupId = $groupIds[array_rand($groupIds)];
//
//        $stoneIds = DB::table('jw_inserts.natural_stones')->where('stone_group_id', $randGroupId)->pluck('stone_id')->toArray();
//
//        return $stoneIds[array_rand($stoneIds)];
    }

    public function randColourStone(string $stone): array
    {
        $items = data_get(Config::array('data-seed.insert-seed'), '*.stones.*');

        $tmp = [];

        foreach ($items as $item) {
            dump($item);
            if ($item['name'] === $stone) {
                foreach ($item['colour'] as $colour) {
                    for ($i = 0; $i < $colour['probability']; $i++) {
                        $tmp[] = $colour['colour'];
                    }
                }
            }
        }

        return [
            'id' => DB::table('jw_inserts.colours')->where('name', $tmp[array_rand($tmp)])->first()->id,
            'colour' => $tmp[array_rand($tmp)],
        ];
    }

    public function randShapeStone($stone): string
    {
        $shapes = ['круг','овал','маркиз','груша','сердце'];
        $tmp = [];

        if ($stone === 'бриллиант' || $stone === 'фианит') {
            $tmp[] = 'круг';
        } else {
            foreach($shapes as $shape) {
                if ($shape === 'круг') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }
//                dump($shape);
                if ($shape === 'овал') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }

                if ($shape === 'сердце') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }

                if ($shape === 'маркиз') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }

                if ($shape === 'груша') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }
            }
        }

//        dd($tmp);
        return $tmp[array_rand($tmp)];
    }
}
