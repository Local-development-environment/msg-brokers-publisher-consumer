<?php
declare(strict_types=1);

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class SQLTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group_id = 2;
        dd(Stone::from('jw_inserts.stones as s')
            ->join('jw_inserts.type_origins as to', 's.type_origin_id', '=', 'to.id')
            ->select(
                'to.*', 'to.description as to_description', 'to.name as to_name',
                's.*'
            )
            ->get()
        );
        $group = DB::table(StoneEnum::TABLE_NAME->value . ' as s')
            ->join('jw_inserts.type_origins as to', 's.type_origin_id', '=', 'to.id')
            ->join('jw_inserts.natural_stones as ns', 's.id', '=', 'ns.id')
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

        dd($group);
        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_inserts;');
        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_jewelleries;');
        dd('ok');
        dump(Factory::create()->e164PhoneNumber);
        preg_match_all('/\d+/', Factory::create()->e164PhoneNumber, $matches);
        dd(implode('', $matches[0]));

        dd(data_get(Config::array('data-seed.insert-seed'), '*.stones.*'));
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
            ->get();
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

        dd(array_rand(Arr::flatten($groupIds)));
//        dd(VJewellery::query()
//            ->select('*')
//            ->where(DB::raw("(select jsonb_path_query(vj.metals, '$[*] ? (@.metal_id == 4)') as test from jw_views.v_jewelleries as vj)"), '=', 5)
//            ->get()
//        );


//        dd(DB::raw("(select jsonb_path_query(vj.metals, '$[*] ? (@.metal_id == 4)') as test from jw_views.v_jewelleries as vj)"));
    }
}
