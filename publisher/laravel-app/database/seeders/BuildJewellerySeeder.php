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
     * @throws \JsonException
     */
    public function run(): void
    {
        $this->call(InitDataSeeder::class);
        $jeweller = new Jeweller();
//        $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
//        dump([$builder]);
        for ($i = 0; $i < 1000; $i++) {
            dump($i);
            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());

            $this->addJewellery($builder);
//            dump($builder);
        }

        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_inserts;');
        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_jewelleries;');

    }

    /**
     * @throws \JsonException
     */
    private function addJewellery(array $jewelleryData):void
    {
        $jewelleryId = DB::table('jewelleries.jewelleries')->insertGetId([
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

        $this->addInsert($jewelleryData, $jewelleryId);
        $this->addMetal($jewelleryData, $jewelleryId);
        $this->addCoverage($jewelleryData, $jewelleryId);
        $this->addProperty($jewelleryData, $jewelleryId);
    }

    /**
     * @throws \JsonException
     */
    private function addInsert(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['jw_insert']) {
            foreach ($jewelleryData['jw_insert'] as $jewelleryInsert) {
                $stone_id = DB::table('jw_inserts.stones')->where('name',$jewelleryInsert['stone'])->value('id');
                $colour_id = DB::table('jw_inserts.colours')->where('name',$jewelleryInsert['colour'])->value('id');
                $facet_id = DB::table('jw_inserts.facets')->where('name',$jewelleryInsert['facet'])->value('id');
                if (DB::table('jw_inserts.insert_stones')->count() !== 0) {
                    $checkUnique = DB::table('jw_inserts.insert_stones')
                        ->where('stone_id', $stone_id)
                        ->where('colour_id', $colour_id)
                        ->where('facet_id', $facet_id)
                        ->count();
//                        dd($checkUnique);
                } else {
                    $checkUnique = 0;
                }
                if ($checkUnique === 0) {
                    $stoneId = DB::table('jw_inserts.insert_stones')->insertGetId([
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

                $metricId = DB::table('jw_inserts.metrics')->insertGetId([
                    'quantity' => $jewelleryInsert['metrics']['quantity'],
                    'weight' => $jewelleryInsert['metrics']['weight'],
                    'unit' => $jewelleryInsert['metrics']['weight_unit'],
                    'dimensions' => json_encode($jewelleryInsert['metrics']['dimensions'], JSON_THROW_ON_ERROR),
                    'created_at' => now()
                ]);

                DB::table('jw_inserts.inserts')->insert([
                    'insert_stone_id' => $stoneId,
                    'jewellery_id' => $jewelleryId,
                    'metric_id' => $metricId,
                    'created_at' => now()
                ]);
            }
        }
    }

    private function addCoverage(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['jw_coverage']) {
            foreach ($jewelleryData['jw_coverage'] as $coverage) {
                $coverageId = DB::table('jw_coverages.coverages')->where('name',$coverage)->value('id');
                DB::table('jw_coverages.coverage_jewellery')->insertGetId([
                    'jewellery_id' => $jewelleryId,
                    'coverage_id' => $coverageId,
                ]);
            }
        }
    }

    private function addMetal(array $jewelleryData, int $jewelleryId): void
    {
        $metal = $jewelleryData['prcs_metal_prop']['prcs_metal'];
        $colour = $jewelleryData['prcs_metal_prop']['prcs_metal_colour'];
        $hallmark = $jewelleryData['prcs_metal_prop']['prcs_metal_hallmark'];

        if ($jewelleryData['prcs_metal_prop']) {
            $metal_id = DB::table('jw_metals.metals')->where('name',$metal)->value('id');
            $colour_id = DB::table('jw_metals.colours')->where('name',$colour)->value('id');
            $hallmark_id = DB::table('jw_metals.hallmarks')->where('value',$hallmark)->value('id');
            if (DB::table('jw_inserts.insert_stones')->count() !== 0) {
                $checkUnique = DB::table('jw_metals.metal_details')
                    ->where('metal_id', $metal_id)
                    ->where('colour_id', $colour_id)
                    ->where('hallmark_id', $hallmark_id)
                    ->count();
//                        dd($checkUnique);
            } else {
                $checkUnique = 0;
            }

            if ($checkUnique === 0) {
                $metalDetailId = DB::table('jw_metals.metal_details')->insertGetId([
                    'metal_id' => DB::table('jw_metals.metals')->where('name',$metal)->value('id'),
                    'colour_id' => DB::table('jw_metals.colours')->where('name',$colour)->value('id'),
                    'hallmark_id' => DB::table('jw_metals.hallmarks')->where('value',$hallmark)->value('id'),
                    'created_at' => now(),
                ]);
            } else {
                $metalDetailId = DB::table('jw_metals.metal_details')->where('metal_id', $metal_id)
                    ->where('colour_id', $colour_id)
                    ->where('hallmark_id', $hallmark_id)->value('id');
//                        dump('********************************************' . $stoneId);
            }

            DB::table('jw_metals.jewellery_metal_detail')->insert([
                'metal_detail_id' => $metalDetailId,
                'jewellery_id' => $jewelleryId,
                'created_at' => now()
            ]);
        }
    }

    /**
     * @throws \JsonException
     */
    private function addProperty(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'броши') {
                $this->addBrooches($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'подвески-шарм') {
                $this->addCharmPendants($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'зажим для галстука') {
                $this->addTieClips($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'подвески') {
                $this->addPendants($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'запонки') {
                $this->addCuffLinks($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'пирсинг') {
                $this->addPiercings($jewelleryData, $jewelleryId);
            }
        }
    }

    /**
     * @throws \JsonException
     */
    private function addBrooches(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.brooches')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['props']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    /**
     * @throws \JsonException
     */
    private function addCharmPendants(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.charm_pendants')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['props']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    /**
     * @throws \JsonException
     */
    private function addPendants(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.pendants')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['props']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    /**
     * @throws \JsonException
     */
    private function addTieClips(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.tie_clips')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['props']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    private function addCuffLinks(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.cuff_links')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'created_at' => now()
        ]);
    }

    private function addPiercings(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.piercings')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'created_at' => now()
        ]);
    }
}
