<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Inserts\InsertExteriors\Enums\InsertExteriorEnum;
use Domain\Inserts\InsertMetrics\Enums\InsertMetricEnum;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use Domain\Jewelleries\JewelleryBuilder\BaseJewelleryBuilder;
use Domain\Jewelleries\JewelleryBuilder\Jeweller;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeEnum;
use Domain\PreciousMetals\MetalColours\Enums\GoldenColourEnum;
use Domain\PreciousMetals\MetalHallmarks\Enums\MetalHallmarkEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use JsonException;

final class BuildJewellerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws JsonException
     */
    public function run($items): void
    {
//        $this->call(InitDataSeeder::class);
//        $this->call(InitUserSeeder::class);

        $jeweller = new Jeweller();
//        $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
//        dump([$builder]);
        for ($i = 0; $i < $items; $i++) {
            dump($i);
            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());

            $this->addJewellery($builder);
//            dd($builder);
        }

        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_inserts;');
        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_jewelleries;');

    }

    /**
     * @throws JsonException
     */
    private function addJewellery(array $jewelleryData):void
    {
        $jewelleryId = DB::table('jewelleries.jewelleries')->insertGetId([
            'category_id' => DB::table('jewelleries.categories')->where('name',$jewelleryData['jw_category'])
                ->value('id'),
            'name' => $jewelleryData['name'],
            'slug' => Str::slug($jewelleryData['name']),
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
        $this->addMedia($jewelleryData, $jewelleryId);
    }

    /**
     * @throws JsonException
     */
    private function addInsert(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['jw_insert']) {
            foreach ($jewelleryData['jw_insert'] as $jewelleryInsert) {
                $stone_id = DB::table('jw_inserts.stones')->where('name',$jewelleryInsert['stone'])->value('id');
                $colour_id = DB::table('jw_inserts.colours')->where('name',$jewelleryInsert['colour'])->value('id');
                $facet_id = DB::table('jw_inserts.facets')->where('name',$jewelleryInsert['facet'])->value('id');
                if (DB::table(InsertExteriorEnum::TABLE_NAME->value)->count() !== 0) {
                    $checkUnique = DB::table(InsertExteriorEnum::TABLE_NAME->value)
                        ->where('stone_id', $stone_id)
                        ->where('colour_id', $colour_id)
                        ->where('facet_id', $facet_id)
                        ->count();
//                        dd($checkUnique);
                } else {
                    $checkUnique = 0;
                }
                if ($checkUnique === 0) {
                    $stoneId = DB::table(InsertExteriorEnum::TABLE_NAME->value)->insertGetId([
                        'stone_id' => DB::table('jw_inserts.stones')->where('name',$jewelleryInsert['stone'])->value('id'),
                        'colour_id' => DB::table('jw_inserts.colours')->where('name',$jewelleryInsert['colour'])->value('id'),
                        'facet_id' => DB::table('jw_inserts.facets')->where('name',$jewelleryInsert['facet'])->value('id'),
                        'created_at' => now(),
                    ]);
                } else {
                    $stoneId = DB::table(InsertExteriorEnum::TABLE_NAME->value)->where('stone_id', $stone_id)
                        ->where('colour_id', $colour_id)
                        ->where('facet_id', $facet_id)->value('id');
//                        dump('********************************************' . $stoneId);
                }

                $insertId = DB::table('jw_inserts.inserts')->insertGetId([
                    'insert_exterior_id' => $stoneId,
                    'jewellery_id' => $jewelleryId,
                    'created_at' => now()
                ]);

                DB::table(InsertMetricEnum::TABLE_NAME->value)->insertGetId([
                    'id' => $insertId,
                    'quantity' => $jewelleryInsert['metrics']['quantity'],
                    'weight' => $jewelleryInsert['metrics']['weight'],
                    'unit' => $jewelleryInsert['metrics']['weight_unit'],
                    'dimensions' => json_encode($jewelleryInsert['metrics']['dimensions'], JSON_THROW_ON_ERROR),
                    'created_at' => now()
                ]);

                if ($jewelleryInsert['optional_info']) {
                    DB::table(InsertOptionalInfoEnum::TABLE_NAME->value)->insertGetId([
                        'id' => $insertId,
                        'info' => json_encode($jewelleryInsert['optional_info']),
                    ]);
                }
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
//        dd($jewelleryData['prcs_metal_prop']);
        if ($jewelleryData['prcs_metal_prop']) {
            $metal_id = DB::table(MetalTypeEnum::TABLE_NAME->value)->where('name',$metal)->value('id');
            $colour_id = DB::table(GoldenColourEnum::TABLE_NAME->value)->where('name',$colour)->value('id');
            $hallmark_id = DB::table('jw_metals.hallmarks')->where('value',$hallmark)->value('id');
            if (DB::table(InsertExteriorEnum::TABLE_NAME->value)->count() !== 0) {
                $checkUnique = DB::table(MetalHallmarkEnum::TABLE_NAME->value)
                    ->where('metal_type_id', $metal_id)
                    ->where('hallmark_id', $hallmark_id)
                    ->count();
//                        dd($checkUnique);
            } else {
                $checkUnique = 0;
            }

            if ($checkUnique === 0) {
                $metalDetailId = DB::table('jw_metals.metal_details')->insertGetId([
                    'metal_id' => DB::table(MetalTypeEnum::TABLE_NAME->value)->where('name',$metal)->value('id'),
                    'colour_id' => DB::table('jw_metals.colours')->where('name',$colour)->value('id'),
                    'hallmark_id' => DB::table('jw_metals.hallmarks')->where('value',$hallmark)->value('id'),
                    'created_at' => now(),
                ]);
            } else {
                $metalDetailId = DB::table(MetalHallmarkEnum::TABLE_NAME->value)->where('metal_type_id', $metal_id)
                    ->where('colour_id', $colour_id)
                    ->where('hallmark_id', $hallmark_id)->value('id');
//                        dump('********************************************' . $stoneId);
            }

            DB::table('jw_metals.jewellery_metals')->insert([
                'metal_detail_id' => $metalDetailId,
                'jewellery_id' => $jewelleryId,
                'created_at' => now()
            ]);
        }
    }

    /**
     * @throws JsonException
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
            if ($jewelleryData['jw_category'] === 'зажимы для галстука') {
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

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'серьги') {
                $this->addEarrings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'кольца') {
                $this->addRings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'браслеты') {
                $this->addBracelets($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'цепи') {
                $this->addChains($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'колье') {
                $this->addNecklaces($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['jw_category'] === 'бусы') {
                $this->addBeads($jewelleryData, $jewelleryId);
            }
        }
    }

    /**
     * @throws JsonException
     */
    private function addBrooches(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.brooches')->insertGetId([
            'id' => $jewelleryId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['props']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    /**
     * @throws JsonException
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
     * @throws JsonException
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
     * @throws JsonException
     */
    private function addTieClips(array $jewelleryData, int $jewelleryId): void
    {
//        dd($jewelleryData);
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
            'id' => $jewelleryId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'created_at' => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addEarrings(array $jewelleryData, int $jewelleryId): void
    {
        $claspId = DB::table('jw_properties.earring_clasps')->where('name',$jewelleryData['props']['parameters']['clasp'])->value('id');
        $typeId = DB::table('jw_properties.earring_types')->where('name',$jewelleryData['props']['parameters']['earring_type'])->value('id');

        $earringId = DB::table('jw_properties.earrings')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'earring_clasp_id' => $claspId,
            'quantity' => $jewelleryData['props']['parameters']['quantity'],
            'price' => $jewelleryData['props']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['props']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);

        DB::table('jw_properties.earring_earring_type')->insertGetId([
            'earring_id' => $earringId,
            'earring_type_id' => $typeId,
            'created_at' => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addRings(array $jewelleryData, int $jewelleryId): void
    {
//        dd($jewelleryData['props']['parameters']['ring_finger']);
        $ringFingerId = DB::table(RingFingerEnum::TABLE_NAME->value)
            ->where('name',$jewelleryData['props']['parameters']['ring_finger'])
            ->value('id');


        $ringId = DB::table('jw_properties.rings')->insertGetId([
            'id' => $jewelleryId,
            'ring_finger_id' => $ringFingerId,
            'dimensions' => json_encode($jewelleryData['props']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['props']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
//            dump($sizePriceQuantity);

            DB::table('jw_properties.ring_metrics')->insertGetId([
                'ring_id' => $ringId,
                'ring_size_id' => DB::table('jw_properties.ring_sizes')->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addBracelets(array $jewelleryData, int $jewelleryId): void
    {
//        dd($jewelleryData['props']);
        $bodyPartId = DB::table('jw_properties.body_parts')
            ->where('name',$jewelleryData['props']['parameters']['body_part'])
            ->value('id');


        $braceletId = DB::table('jw_properties.bracelets')->insertGetId([
            'id' => $jewelleryId,
            'body_part_id' => $bodyPartId,
            'clasp_id' => DB::table('jw_properties.clasps')->where('name',$jewelleryData['props']['parameters']['clasp'])->value('id'),
            'bracelet_base_id' => DB::table('jw_properties.bracelet_bases')->where('name',$jewelleryData['props']['parameters']['bracelet_bases'])->value('id'),
            'created_at' => now()
        ]);

        if ($jewelleryData['props']['parameters']['weaving']) {
            DB::table('jw_properties.bracelet_weavings')->insertGetId([
                'bracelet_id' => $braceletId,
                'weaving_id' => DB::table('jw_properties.weavings')
                    ->where('name',$jewelleryData['props']['parameters']['weaving']['weaving'])
                    ->value('id'),
                'fullness' => $jewelleryData['props']['parameters']['weaving']['fullness'],
                'diameter' => $jewelleryData['props']['parameters']['weaving']['wire_diameter'],
                'created_at' => now()
            ]);
        }
//        dd($jewelleryData['props']['parameters']['size_price_quantity']);
        foreach ($jewelleryData['props']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
//            dump($jewelleryData);

            DB::table('jw_properties.bracelet_metrics')->insertGetId([
                'bracelet_id' => $braceletId,
                'bracelet_size_id' => DB::table('jw_properties.bracelet_sizes')->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addChains(array $jewelleryData, int $jewelleryId): void
    {
        $chainId = DB::table('jw_properties.chains')->insertGetId([
            'id' => $jewelleryId,
            'clasp_id' => DB::table('jw_properties.clasps')->where('name',$jewelleryData['props']['parameters']['clasp'])->value('id'),
            'created_at' => now()
        ]);
//        dump($jewelleryData['props']['parameters']['weaving']);
//        dump($jewelleryData);
        if ($jewelleryData['props']['parameters']['weaving']) {
            DB::table('jw_properties.chain_weavings')->insertGetId([
                'chain_id' => $chainId,
                'weaving_id' => DB::table('jw_properties.weavings')
                    ->where('name',$jewelleryData['props']['parameters']['weaving']['weaving'])
                    ->value('id'),
                'fullness' => $jewelleryData['props']['parameters']['weaving']['fullness'],
                'diameter' => $jewelleryData['props']['parameters']['weaving']['wire_diameter'],
                'created_at' => now()
            ]);
        }

        foreach ($jewelleryData['props']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
//            dump($jewelleryData);

            DB::table('jw_properties.chain_metrics')->insertGetId([
                'chain_id' => $chainId,
                'neck_size_id' => DB::table('jw_properties.neck_sizes')->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addNecklaces(array $jewelleryData, int $jewelleryId): void
    {
        $necklaceId = DB::table('jw_properties.necklaces')->insertGetId([
            'id' => $jewelleryId,
            'clasp_id' => DB::table('jw_properties.clasps')->where('name',$jewelleryData['props']['parameters']['clasp'])->value('id'),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['props']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
//            dump($jewelleryData);

            DB::table('jw_properties.necklace_metrics')->insertGetId([
                'necklace_id' => $necklaceId,
                'neck_size_id' => DB::table('jw_properties.neck_sizes')->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addBeads(array $jewelleryData, int $jewelleryId): void
    {
        $beadId = DB::table('jw_properties.beads')->insertGetId([
            'id' => $jewelleryId,
            'clasp_id' => DB::table('jw_properties.clasps')->where('name',$jewelleryData['props']['parameters']['clasp'])->value('id'),
            'bead_base_id' => DB::table('jw_properties.bead_bases')->where('name',$jewelleryData['props']['parameters']['bead_bases'])->value('id'),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['props']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
//            dump($jewelleryData);

            DB::table('jw_properties.bead_metrics')->insert([
                'bead_id' => $beadId,
                'neck_size_id' => DB::table('jw_properties.neck_sizes')->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addMedia(array $jewelleryData, int $jewelleryId): void
    {
//        dump($jewelleryData['jw_media']);
        $types = DB::table('jw_medias.video_types')->get();

        foreach ($jewelleryData['jw_media'] as $keyP => $producer) {

            $producerId = DB::table('jw_medias.producers')->where('name',$keyP)->value('id');

            foreach ($producer as $keyC => $category) {
                if ($keyC === 'фото') {
                    foreach ($category as $item) {
                        DB::table('jw_medias.pictures')->insertGetId([
                            'jewellery_id' => $jewelleryId,
                            'producer_id' => $producerId,
                            'name' => $item,
                            'alt_name' => $jewelleryData['name'],
                            'extension' => 'jpg',
                            'type' => 'image/jpeg',
                            'src' => 'https://server/' . $item . '.jpg',
                            'is_active' => true,
                            'created_at' => now()
                        ]);
                    }
                } else {
                    foreach ($category as $item) {
                        $videoId = DB::table('jw_medias.videos')->insertGetId([
                            'jewellery_id' => $jewelleryId,
                            'producer_id' => $producerId,
                            'name' => $item,
                            'alt_name' => $jewelleryData['name'],
                            'is_active' => true,
                            'created_at' => now()
                        ]);
                        foreach ($types as $type) {
                            DB::table('jw_medias.video_details')->insertGetId([
                                'video_id' => $videoId,
                                'video_type_id' => $type->id,
                                'src' => 'https://server/' . $item . '.' . $type->extension,
                                'created_at' => now()
                            ]);
                        }
                    }
                }
            }
        }
    }
}
