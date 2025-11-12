<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Coverings\Coverings\Enums\CoveringEnum;
use Domain\Coverings\CoveringTypes\Enums\CoveringTypeEnum;
use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\InsertExteriors\Enums\InsertExteriorEnum;
use Domain\Inserts\InsertMetrics\Enums\InsertMetricEnum;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Jewelleries\Categories\Enums\CategoryEnum;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\Jewelleries\JewelleryBuilder\BaseJewelleryBuilder;
use Domain\Jewelleries\JewelleryBuilder\Jeweller;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\PreciousMetals\ColourCombinations\Enums\ColourCombinationEnum;
use Domain\PreciousMetals\GoldenColours\Enums\GoldenColourEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkEnum;
use Domain\PreciousMetals\MetalHallmarks\Enums\MetalHallmarkEnum;
use Domain\PreciousMetals\Metals\Enums\MetalEnum;
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
    public function run(int $items, bool $all = true): void
    {
        if ($all) {
            $this->call(InitDataSeeder::class);
            $this->call(InitUserSeeder::class);
        }

        $jeweller = new Jeweller();

        for ($i = 0; $i < $items; $i++) {
            dump($i);
            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());

            $this->addJewellery($builder);
        }

        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_inserts;');
        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_jewelleries;');

    }

    /**
     * @throws JsonException
     */
    private function addJewellery(array $jewelleryData):void
    {
        dump($jewelleryData['metal_props']);
        $jewelleryId = DB::table(JewelleryEnum::TABLE_NAME->value)->insertGetId([
            'category_id' => DB::table(CategoryEnum::TABLE_NAME->value)->where('name',$jewelleryData['category'])
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
        if ($jewelleryData['inserts']) {
            foreach ($jewelleryData['inserts'] as $jewelleryInsert) {
                $stone_id = DB::table(StoneEnum::TABLE_NAME->value)->where('name',$jewelleryInsert['stone'])->value('id');
                $colour_id = DB::table(ColourEnum::TABLE_NAME->value)->where('name',$jewelleryInsert['colour'])->value('id');
                $facet_id = DB::table(FacetEnum::TABLE_NAME->value)->where('name',$jewelleryInsert['facet'])->value('id');
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
        if ($jewelleryData['covering']['covering_type']) {
            foreach ($jewelleryData['covering']['covering_type'] as $covering) {
                $coveringTypeId = DB::table(CoveringTypeEnum::TABLE_NAME->value)->where('name',$covering)->value('id');
                DB::table(CoveringEnum::TABLE_NAME->value)->insertGetId([
                    'jewellery_id' => $jewelleryId,
                    'covering_type_id' => $coveringTypeId,
                ]);
            }
        }
    }

    private function addMetal(array $jewelleryData, int $jewelleryId): void
    {
        $metalTypeId = DB::table(MetalTypeEnum::TABLE_NAME->value)
            ->where('name',$jewelleryData['metal_props']['metal_type'])->value('id');
        $hallmarkId = DB::table(HallmarkEnum::TABLE_NAME->value)
            ->where('value',$jewelleryData['metal_props']['hallmark'])->value('id');
        $metalHallmarkId = DB::table(MetalHallmarkEnum::TABLE_NAME->value)
            ->where('metal_type_id', $metalTypeId)->where('hallmark_id', $hallmarkId)->value('id');
//        dd($metalHallmarkId);
        $metalId = DB::table(MetalEnum::TABLE_NAME->value)->insertGetId([
            'id' => $jewelleryId,
            'metal_hallmark_id' => $metalHallmarkId,
            'created_at' => now()
        ]);

        if ($jewelleryData['metal_props']['golden_colour']) {
            foreach ($jewelleryData['metal_props']['golden_colour'] as $goldenColour) {
                $goldenColourId = DB::table(GoldenColourEnum::TABLE_NAME->value)->where('name',$goldenColour)->value('id');
                DB::table(ColourCombinationEnum::TABLE_NAME->value)->insertGetId([
                    'metal_id' => $metalId,
                    'golden_colour_id' => $goldenColourId,
                ]);
            }
        }
    }

    /**
     * @throws JsonException
     */
    private function addProperty(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'броши') {
                $this->addBrooches($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'подвески-шарм') {
                $this->addCharmPendants($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'зажимы для галстука') {
                $this->addTieClips($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'подвески') {
                $this->addPendants($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'запонки') {
                $this->addCuffLinks($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'пирсинг') {
                $this->addPiercings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'серьги') {
                $this->addEarrings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'кольца') {
                $this->addRings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'браслеты') {
                $this->addBracelets($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'цепи') {
                $this->addChains($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'колье') {
                $this->addNecklaces($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['props']) {
            if ($jewelleryData['category'] === 'бусы') {
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
