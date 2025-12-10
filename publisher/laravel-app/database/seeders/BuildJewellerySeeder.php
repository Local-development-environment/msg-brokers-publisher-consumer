<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Jewelleries\Categories\Enums\CategoryEnum;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\JewelleryGenerator\BaseJewelleryBuilder;
use Domain\JewelleryGenerator\InitProperties;
use Domain\JewelleryGenerator\Jeweller;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\InitInsertData;
use Domain\JewelleryGenerator\Jewelleries\MetalItems\InitMetalData;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use JsonException;

final class BuildJewellerySeeder extends Seeder
{
    public function run(int $items, bool $all = true): void
    {
        if ($all) {
            $this->call(InitDataSeeder::class);
            $this->call(InitUserSeeder::class);
        }

        $jeweller = new Jeweller();

        $insert = new InitInsertData;
        $insert();

        $metal  = new InitMetalData;
        $metal();

//        dd('stop');
        $initProperties = new initProperties();
        $initProperties->initCategoryProperties();
        $initProperties->initBeadProperties();
        $initProperties->initRingProperties();
        $initProperties->initBraceletProperties();
        $initProperties->initShareProperties();
        $initProperties->initEarringProperties();

//        dd('ok');
        for ($i = 0; $i < $items; $i++) {
            dump($i);
            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
//            dump($builder);
            $this->addJewellery($builder);
        }
//        dd('ok');
//        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_inserts;');
//        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_jewelleries;');

    }

    /**
     * @throws JsonException
     */
    private function addJewellery(array $jewelleryData):void
    {
        dump($jewelleryData);
        $jewelleryId = DB::table(JewelleryEnum::TABLE_NAME->value)->insertGetId([
            'category_id' => DB::table(CategoryEnum::TABLE_NAME->value)->where('name',$jewelleryData['category'])
                ->value('id'),
            'name' => $jewelleryData['jewelleryItem']['name'],
            'slug' => Str::slug($jewelleryData['jewelleryItem']['name']),
            'description' => $jewelleryData['jewelleryItem']['description'],
            'part_number' => $jewelleryData['jewelleryItem']['partNumber'],
            'approx_weight' => $jewelleryData['jewelleryItem']['approxWeight'],
            'is_active' => true,
            'created_at' => now(),
        ]);

        $this->addProperty($jewelleryData, $jewelleryId);
        $this->addMedia($jewelleryData, $jewelleryId);
    }

    /**
     * @throws JsonException
     */
    private function addProperty(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'броши') {
                $this->addBrooches($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'подвески-шарм') {
                $this->addCharmPendants($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'зажимы для галстука') {
                $this->addTieClips($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'подвески') {
                $this->addPendants($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'запонки') {
                $this->addCuffLinks($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'пирсинг') {
                $this->addPiercings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'серьги') {
                $this->addEarrings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'кольца') {
                $this->addRings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'браслеты') {
                $this->addBracelets($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'цепи') {
                $this->addChains($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === 'колье') {
                $this->addNecklaces($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
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
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
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
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    private function addCuffLinks(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.cuff_links')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'created_at' => now()
        ]);
    }

    private function addPiercings(array $jewelleryData, int $jewelleryId): void
    {
        DB::table('jw_properties.piercings')->insertGetId([
            'id' => $jewelleryId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'created_at' => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addEarrings(array $jewelleryData, int $jewelleryId): void
    {
        $claspId = DB::table('jw_properties.earring_clasps')->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id');
        $typeId = DB::table('jw_properties.earring_types')->where('name',$jewelleryData['property']['parameters']['earring_type'])->value('id');

        $earringId = DB::table('jw_properties.earrings')->insertGetId([
            'jewellery_id' => $jewelleryId,
            'earring_clasp_id' => $claspId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
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
            ->where('name',$jewelleryData['property']['parameters']['ring_finger'])
            ->value('id');


        $ringId = DB::table('jw_properties.rings')->insertGetId([
            'id' => $jewelleryId,
            'ring_finger_id' => $ringFingerId,
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
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
            ->where('name',$jewelleryData['property']['parameters']['body_part'])
            ->value('id');


        $braceletId = DB::table('jw_properties.bracelets')->insertGetId([
            'id' => $jewelleryId,
            'body_part_id' => $bodyPartId,
            'clasp_id' => DB::table('jw_properties.clasps')->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id'),
            'bracelet_base_id' => DB::table('jw_properties.bracelet_bases')->where('name',$jewelleryData['property']['parameters']['bracelet_bases'])->value('id'),
            'created_at' => now()
        ]);

        if ($jewelleryData['property']['parameters']['weaving']) {
            DB::table('jw_properties.bracelet_weavings')->insertGetId([
                'bracelet_id' => $braceletId,
                'weaving_id' => DB::table('jw_properties.weavings')
                    ->where('name',$jewelleryData['property']['parameters']['weaving']['weaving'])
                    ->value('id'),
                'fullness' => $jewelleryData['property']['parameters']['weaving']['fullness'],
                'diameter' => $jewelleryData['property']['parameters']['weaving']['wire_diameter'],
                'created_at' => now()
            ]);
        }
//        dd($jewelleryData['props']['parameters']['size_price_quantity']);
        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
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
            'clasp_id' => DB::table('jw_properties.clasps')->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id'),
            'created_at' => now()
        ]);

        if ($jewelleryData['property']['parameters']['weaving']) {
            DB::table('jw_properties.chain_weavings')->insertGetId([
                'chain_id' => $chainId,
                'weaving_id' => DB::table('jw_properties.weavings')
                    ->where('name',$jewelleryData['property']['parameters']['weaving']['weaving'])
                    ->value('id'),
                'fullness' => $jewelleryData['property']['parameters']['weaving']['fullness'],
                'diameter' => $jewelleryData['property']['parameters']['weaving']['wire_diameter'],
                'created_at' => now()
            ]);
        }

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {

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
            'clasp_id' => DB::table('jw_properties.clasps')->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id'),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
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
            'clasp_id' => DB::table('jw_properties.clasps')->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id'),
            'bead_base_id' => DB::table('jw_properties.bead_bases')->where('name',$jewelleryData['property']['parameters']['bead_bases'])->value('id'),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
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
