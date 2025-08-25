<?php

namespace Database\Seeders;

use Domain\Jewelleries\JewelleryBuilder\BaseJewelleryBuilder;
use Domain\Jewelleries\JewelleryBuilder\Jeweller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuildJewellerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jeweller = new Jeweller();
//        $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
//        dump([$builder]);
        for ($i = 0; $i < 100; $i++) {
//            dump($i);
            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
            $this->addJewellery($builder);
            dump($builder);
        }
    }

    private function addJewellery(array $jewelleryData):void
    {
        if ($jewelleryData['jw_category'] === 'броши') {
            DB::table('jewelleries.jewelleries')->insert([
                'category_id' => DB::table('jewelleries.categories')->where('name',$jewelleryData['jw_category'])
                    ->value('id'),
                'name' => $jewelleryData['name'],
                'slug' => Str::slug($jewelleryData['name'], '-'),
                'description' => $jewelleryData['description'],
                'part_number' => $jewelleryData['part_number'],
                'approx_weight' => $jewelleryData['approx_weight'],
                'is_active' => true,
                'created_at' => now(),
            ]);

            if ($jewelleryData['jw_insert']) {
                foreach ($jewelleryData['jw_insert'] as $jewelleryInsert) {
                    $stone_id = DB::table('jw_inserts.stones')->where('name',$jewelleryInsert['stone'])->value('id');
                    $colour_id = DB::table('jw_inserts.colours')->where('name',$jewelleryInsert['colour'])->value('id');
                    $facet_id = DB::table('jw_inserts.facets')->where('name',$jewelleryInsert['facet'])->value('id');
                    if (DB::table('jw_inserts.insert_stones')->count() !== 0) {
                        $checkUnique = DB::table('jw_inserts.insert_stones')->where('stone_id', $stone_id)
                            ->where('colour_id', $colour_id)
                            ->where('facet_id', $facet_id)
                            ->count();
//                        dd($checkUnique);
                    } else {
                        $checkUnique = 0;
                    }
                    if ($checkUnique === 0) {
                        DB::table('jw_inserts.insert_stones')->insertGetId([
                            'stone_id' => DB::table('jw_inserts.stones')->where('name',$jewelleryInsert['stone'])->value('id'),
                            'colour_id' => DB::table('jw_inserts.colours')->where('name',$jewelleryInsert['colour'])->value('id'),
                            'facet_id' => DB::table('jw_inserts.facets')->where('name',$jewelleryInsert['facet'])->value('id'),
                            'created_at' => now(),
                        ]);
                    } else {
                        $stoneId = DB::table('jw_inserts.insert_stones')->where('stone_id', $stone_id)
                            ->where('colour_id', $colour_id)
                            ->where('facet_id', $facet_id)->value('id');
//                        dump('********************************************' . $stoneId);
                    }
                }
            }
        }
    }
}
