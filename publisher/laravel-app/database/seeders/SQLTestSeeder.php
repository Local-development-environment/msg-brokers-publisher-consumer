<?php

namespace Database\Seeders;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SQLTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        dd(VJewellery::query()
            ->select('*')
            ->where(DB::raw("(select jsonb_path_query(vj.metals, '$[*] ? (@.metal_id == 4)') as test from jw_views.v_jewelleries as vj)"), '=', 5)
            ->get()
        );


//        dd(DB::raw("(select jsonb_path_query(vj.metals, '$[*] ? (@.metal_id == 4)') as test from jw_views.v_jewelleries as vj)"));
    }
}
