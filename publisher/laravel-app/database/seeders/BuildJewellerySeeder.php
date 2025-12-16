<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\StoneExteriours\Enums\StoneExteriorEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Jewelleries\Categories\Enums\CategoryEnum;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\JewelleryGenerator\BaseJewelleryBuilder;
use Domain\JewelleryGenerator\InitProperties;
use Domain\JewelleryGenerator\Jeweller;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\InitInsertData;
use Domain\JewelleryGenerator\Jewelleries\Medias\InitMedia;
use Domain\JewelleryGenerator\Jewelleries\MetalItems\InitMetalData;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadEnum;
use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochEnum;
use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricEnum;
use Domain\JewelleryProperties\Chains\Chains\Enums\ChainEnum;
use Domain\JewelleryProperties\Chains\ChainWeavings\Enums\ChainWeavingEnum;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums\CharmPendantEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinks\Enums\CuffLinkEnum;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspEnum;
use Domain\JewelleryProperties\Earrings\EarringEarringTypes\Enums\EarringEarringTypeEnum;
use Domain\JewelleryProperties\Earrings\Earrings\Enums\EarringEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceEnum;
use Domain\JewelleryProperties\Pendants\Pendants\Enums\PendantEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\JewelleryProperties\Rings\RingMetrics\Enums\RingMetricEnum;
use Domain\JewelleryProperties\Rings\Rings\Enums\RingEnum;
use Domain\JewelleryProperties\TieClips\TieClips\Enums\TieClipEnum;
use Domain\Medias\MediaPictures\Pictures\Enums\PictureEnum;
use Domain\Medias\MediaVideos\VideoDetails\Enums\VideoDetailEnum;
use Domain\Medias\MediaVideos\Videos\Enums\VideoEnum;
use Domain\Medias\MediaVideos\VideoTypes\Enums\VideoTypeEnum;
use Domain\Medias\Shared\Producers\Enums\ProducerEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingEnum;
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

        $media = new InitMedia();
        $media();

//        dd('stop');
        $initProperties = new initProperties();
        $initProperties->initCategoryProperties();
//        $initProperties->initBeadProperties();
//        $initProperties->initRingProperties();
//        $initProperties->initBraceletProperties();
//        $initProperties->initShareProperties();
//        $initProperties->initEarringProperties();

//        dd('ok');
        for ($i = 0; $i < $items; $i++) {
            dump($i);
            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
            dump($builder);
//            $this->addJewellery($builder);
        }
        dd('ok');
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
        $this->addInsert($jewelleryData, $jewelleryId);
    }

    private function addInsert(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['insertItem']) {
            foreach ($jewelleryData['insertItem'] as $item) {
                $colourId = DB::table(ColourEnum::TABLE_NAME->value)->where('name',$item['colours'])->value('id');
                $facetId = DB::table(FacetEnum::TABLE_NAME->value)->where('name',$item['facets'])->value('id');
                $stoneId = DB::table(StoneEnum::TABLE_NAME->value)->where('name',$item['stoneName'])->value('id');

                $exteriorId = DB::table(StoneExteriorEnum::TABLE_NAME->value)->where('stone_id',$stoneId)
                    ->where('facet_id',$facetId)->where('colour_id',$colourId)->value('id');
//                dump($exteriorId);

                DB::table(InsertEnum::TABLE_NAME->value)->insert([
                    'jewellery_id' => $jewelleryId,
                    'stone_exterior_id' => $exteriorId,
                    'quantity' => $item['quantity'],
                    'weight' => $item['weight']['carat'],
                    'unit' => 'carat',
                    'dimensions' => json_encode($item['weight']['diameter'], JSON_THROW_ON_ERROR),
                    'created_at' => now(),
                ]);
            }
//            dd($jewelleryData['jewelleryItem']);
        }
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
        DB::table(BroochEnum::TABLE_NAME->value)->insertGetId([
            'id' => $jewelleryId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addCharmPendants(array $jewelleryData, int $jewelleryId): void
    {
        DB::table(CharmPendantEnum::TABLE_NAME->value)->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addPendants(array $jewelleryData, int $jewelleryId): void
    {
        DB::table(PendantEnum::TABLE_NAME->value)->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addTieClips(array $jewelleryData, int $jewelleryId): void
    {
//        dd($jewelleryData);
        DB::table(TieClipEnum::TABLE_NAME->value)->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    private function addCuffLinks(array $jewelleryData, int $jewelleryId): void
    {
        DB::table(CuffLinkEnum::TABLE_NAME->value)->insertGetId([
            'jewellery_id' => $jewelleryId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'created_at' => now()
        ]);
    }

    private function addPiercings(array $jewelleryData, int $jewelleryId): void
    {
        DB::table(PiercingEnum::TABLE_NAME->value)->insertGetId([
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
        $claspId = DB::table(EarringClaspEnum::TABLE_NAME->value)
            ->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id');
        $typeId = DB::table(EarringTypeEnum::TABLE_NAME->value)
            ->where('name',$jewelleryData['property']['parameters']['earring_type'])->value('id');

        $earringId = DB::table(EarringEnum::TABLE_NAME->value)->insertGetId([
            'jewellery_id' => $jewelleryId,
            'earring_clasp_id' => $claspId,
            'quantity' => $jewelleryData['property']['parameters']['quantity'],
            'price' => $jewelleryData['property']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);

        DB::table(EarringEarringTypeEnum::TABLE_NAME->value)->insertGetId([
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
        $ringFingerId = DB::table(RingFingerEnum::TABLE_NAME->value)
            ->where('name',$jewelleryData['property']['parameters']['ring_finger'])
            ->value('id');


        $ringId = DB::table(RingEnum::TABLE_NAME->value)->insertGetId([
            'id' => $jewelleryId,
            'ring_finger_id' => $ringFingerId,
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {

            DB::table(RingMetricEnum::TABLE_NAME->value)->insertGetId([
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
        $bodyPartId = DB::table(BodyPartEnum::TABLE_NAME->value)
            ->where('name',$jewelleryData['property']['parameters']['body_part'])
            ->value('id');


        $braceletId = DB::table(BraceletEnum::TABLE_NAME->value)->insertGetId([
            'id' => $jewelleryId,
            'body_part_id' => $bodyPartId,
            'clasp_id' => DB::table(ClaspEnum::TABLE_NAME->value)
                ->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id'),
            'bracelet_base_id' => DB::table(BraceletBaseEnum::TABLE_NAME->value)
                ->where('name',$jewelleryData['property']['parameters']['bracelet_bases'])->value('id'),
            'created_at' => now()
        ]);

        if ($jewelleryData['property']['parameters']['weaving']) {
            DB::table(BraceletWeavingEnum::TABLE_NAME->value)->insertGetId([
                'bracelet_id' => $braceletId,
                'weaving_id' => DB::table(WeavingEnum::TABLE_NAME->value)
                    ->where('name',$jewelleryData['property']['parameters']['weaving']['weaving'])
                    ->value('id'),
                'fullness' => $jewelleryData['property']['parameters']['weaving']['fullness'],
                'diameter' => $jewelleryData['property']['parameters']['weaving']['wire_diameter'],
                'created_at' => now()
            ]);
        }

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {

            DB::table(BraceletMetricEnum::TABLE_NAME->value)->insertGetId([
                'bracelet_id' => $braceletId,
                'bracelet_size_id' => DB::table(BraceletSizeEnum::TABLE_NAME->value)
                    ->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addChains(array $jewelleryData, int $jewelleryId): void
    {
        $chainId = DB::table(ChainEnum::TABLE_NAME->value)->insertGetId([
            'id' => $jewelleryId,
            'clasp_id' => DB::table(ClaspEnum::TABLE_NAME->value)->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id'),
            'created_at' => now()
        ]);

        if ($jewelleryData['property']['parameters']['weaving']) {
            DB::table(ChainWeavingEnum::TABLE_NAME->value)->insertGetId([
                'chain_id' => $chainId,
                'weaving_id' => DB::table(WeavingEnum::TABLE_NAME->value)
                    ->where('name',$jewelleryData['property']['parameters']['weaving']['weaving'])
                    ->value('id'),
                'fullness' => $jewelleryData['property']['parameters']['weaving']['fullness'],
                'diameter' => $jewelleryData['property']['parameters']['weaving']['wire_diameter'],
                'created_at' => now()
            ]);
        }

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {

            DB::table(ChainMetricEnum::TABLE_NAME->value)->insertGetId([
                'chain_id' => $chainId,
                'neck_size_id' => DB::table(NeckSizeEnum::TABLE_NAME->value)
                    ->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addNecklaces(array $jewelleryData, int $jewelleryId): void
    {
        $necklaceId = DB::table(NecklaceEnum::TABLE_NAME->value)->insertGetId([
            'id' => $jewelleryId,
            'clasp_id' => DB::table(ClaspEnum::TABLE_NAME->value)
                ->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id'),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
            DB::table(NecklaceMetricEnum::TABLE_NAME->value)->insertGetId([
                'necklace_id' => $necklaceId,
                'neck_size_id' => DB::table(NeckSizeEnum::TABLE_NAME->value)
                    ->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addBeads(array $jewelleryData, int $jewelleryId): void
    {
        $beadId = DB::table(BeadEnum::TABLE_NAME->value)->insertGetId([
            'id' => $jewelleryId,
            'clasp_id' => DB::table(ClaspEnum::TABLE_NAME->value)
                ->where('name',$jewelleryData['property']['parameters']['clasp'])->value('id'),
            'bead_base_id' => DB::table(BeadBaseEnum::TABLE_NAME->value)
                ->where('name',$jewelleryData['property']['parameters']['bead_bases'])->value('id'),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
            DB::table(BeadMetricEnum::TABLE_NAME->value)->insert([
                'bead_id' => $beadId,
                'neck_size_id' => DB::table(NeckSizeEnum::TABLE_NAME->value)->where('value',$sizePriceQuantity['size'])->value('id'),
                'quantity' => $sizePriceQuantity['quantity'],
                'price' => $sizePriceQuantity['price'],
                'created_at' => now()
            ]);
        }
    }

    private function addMedia(array $jewelleryData, int $jewelleryId): void
    {
        $types = DB::table(VideoTypeEnum::TABLE_NAME->value)->get();

        foreach ($jewelleryData['media'] as $keyP => $producer) {

            $producerId = DB::table(ProducerEnum::TABLE_NAME->value)->where('name',$keyP)->value('id');

            foreach ($producer as $keyC => $category) {
                if ($keyC === 'фото') {
                    foreach ($category as $item) {
                        DB::table(PictureEnum::TABLE_NAME->value)->insertGetId([
                            'jewellery_id' => $jewelleryId,
                            'producer_id' => $producerId,
                            'name' => $item,
                            'alt_name' => $jewelleryData['jewelleryItem']['name'],
                            'extension' => 'jpg',
                            'type' => 'image/jpeg',
                            'src' => 'https://server/' . $item . '.jpg',
                            'is_active' => true,
                            'created_at' => now()
                        ]);
                    }
                } else {
                    foreach ($category as $item) {
                        $videoId = DB::table(VideoEnum::TABLE_NAME->value)->insertGetId([
                            'jewellery_id' => $jewelleryId,
                            'producer_id' => $producerId,
                            'name' => $item,
                            'alt_name' => $jewelleryData['jewelleryItem']['name'],
                            'is_active' => true,
                            'created_at' => now()
                        ]);
                        foreach ($types as $type) {
                            DB::table(VideoDetailEnum::TABLE_NAME->value)->insertGetId([
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
