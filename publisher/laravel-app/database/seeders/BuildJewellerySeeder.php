<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\JewelleryGenerator\BaseJewelleryBuilder;
use Domain\JewelleryGenerator\InitProperties;
use Domain\JewelleryGenerator\Jeweller;
use Domain\JewelleryGenerator\Jewelleries\Categories\InitCategoryData;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\InitInsertData;
use Domain\JewelleryGenerator\Jewelleries\Medias\InitMedia;
use Domain\JewelleryGenerator\Jewelleries\MetalItems\InitMetalData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetEnum;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Enums\InsertEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Enums\StoneColourEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneEnum;
use JewelleryDomain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Enums\JewelleryEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Enums\BeadBaseEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums\BeadMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Enums\BeadEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Enums\BodyPartEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Enums\BraceletEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Enums\BraceletTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochClasps\Enums\BroochClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Enums\BroochEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochTypes\Enums\BroochTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Enums\ChainMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Enums\ChainEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Enums\ChainWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Enums\CharmPendantEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkForms\Enums\CuffLinkFormEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinks\Enums\CuffLinkEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkTypes\Enums\CuffLinkTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\EarringClasps\Enums\EarringClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\EarringEarringTypes\Enums\EarringEarringTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\Earrings\Enums\EarringEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\EarringTypes\Enums\EarringTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Enums\NecklaceEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Enums\PendantEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Enums\PiercingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingTypes\Enums\PiercingTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums\RingDetailEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums\RingMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Enums\RingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Enums\RingTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Enums\TieClipEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClipTypes\Enums\TieClipTypeEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogPictures\Enums\CatalogPictureEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideoDetails\Enums\CatalogVideoDetailEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Enums\CatalogVideoEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Enums\ReviewMediaEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewPictures\Enums\ReviewPictureEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideoDetails\Enums\ReviewVideoDetailEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Enums\ReviewVideoEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums\MediaTypeEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums\VideoTypeEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\Coverages\Enums\CoverageEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\Hallmarks\Enums\HallmarkEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\JewelleryCoverages\Enums\JewelleryCoverageEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\JewelleryMetals\Enums\JewelleryMetalEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\PreciousMetals\Enums\PreciousMetalEnum;
use JsonException;

final class BuildJewellerySeeder extends Seeder
{
    /**
     * @throws JsonException
     */
    public function run(int $items, bool $all = true): void
    {
        if ($all) {
            $this->call(InitDataSeeder::class);
            $this->call(InitUserSeeder::class);
        }

        $jeweller = new Jeweller();

        $category = new InitCategoryData();
        $category();

        $insert = new InitInsertData;
        $insert();

        $metal = new InitMetalData;
        $metal();

        $media = new InitMedia();
        $media();

        $properties = new InitProperties();
        $properties->initBeadProperties();
        $properties->initBraceletProperties();
        $properties->initEarringProperties();
        $properties->initNecklaceProperties();
        $properties->initRingProperties();
        $properties->initShareProperties();
        $properties->initCuffLinkProperties();
        $properties->initPiercingProperties();
        $properties->initBroochProperties();
        $properties->initTieClipProperties();
        $properties->initCharmPendantProperties();
        $properties->initPendantProperties();

        /** NEW INSERT OPTIONS */



        //        dd('ok');
        for ($i = 0; $i < $items; $i++) {
            dump($i);
            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
            dump($builder);
            $this->addJewellery($builder);
        }

        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_inserts;');
        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_jewelleries;');

    }

    /**
     * @throws JsonException
     */
    private function addJewellery(array $jewelleryData): void
    {
        //        dd($jewelleryData);
        $jewelleryId = DB::table(JewelleryEnum::TABLE_NAME->value)->insertGetId([
            'jewellery_category_id' => DB::table(JewelleryCategoryEnum::TABLE_NAME->value)->where('name', $jewelleryData['category'])
                ->value('id'),
            'name'                  => $jewelleryData['jewelleryItem']['name'],
            'slug'                  => Str::slug($jewelleryData['jewelleryItem']['name']),
            'description'           => $jewelleryData['jewelleryItem']['description'],
            'part_number'           => $jewelleryData['jewelleryItem']['partNumber'],
            'approx_weight'         => $jewelleryData['jewelleryItem']['approxWeight'],
            'is_active'             => true,
            'created_at'            => now(),
        ]);

        $this->addProperty($jewelleryData, $jewelleryId);
        $this->addMediaCatalog($jewelleryData, $jewelleryId);
        $this->addMediaReview($jewelleryData, $jewelleryId);
        $this->addInsert($jewelleryData, $jewelleryId);
        $this->addMetals($jewelleryData, $jewelleryId);
        $this->addCoverages($jewelleryData, $jewelleryId);
    }

    /**
     * @throws JsonException
     */
    private function addInsert(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['insertItem']) {
            foreach ($jewelleryData['insertItem'] as $item) {

                $colourId = DB::table(StoneColourEnum::TABLE_NAME->value)->where('name', $item['colours'])->value('id');
                $facetId  = DB::table(FacetEnum::TABLE_NAME->value)->where('name', $item['facets'])->value('id');
                $stoneId  = DB::table(StoneEnum::TABLE_NAME->value)->where('name', $item['stoneName'])->value('id');

                $exteriorId = DB::table(StoneExteriorEnum::TABLE_NAME->value)->where('stone_id', $stoneId)
                    ->where('facet_id', $facetId)->where('stone_colour_id', $colourId)->value('id');

                DB::table(InsertEnum::TABLE_NAME->value)->insert([
                    'jewellery_id'      => $jewelleryId,
                    'stone_exterior_id' => $exteriorId,
                    'quantity'          => $item['quantity'],
                    'weight'            => $item['weight'],
                    'unit'              => 'carat',
                    'dimensions'        => json_encode($item['dimensions'], JSON_THROW_ON_ERROR),
                    'created_at'        => now(),
                ]);
            }
        }
    }

    /**
     * @throws JsonException
     */
    private function addProperty(array $jewelleryData, int $jewelleryId): void
    {
        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::BROOCHES->value) {
                $this->addBrooches($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::CHARM_PENDANTS->value) {
                $this->addCharmPendants($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::TIE_CLIPS->value) {
                $this->addTieClips($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::PENDANTS->value) {
                $this->addPendants($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::CUFF_LINKS->value) {
                $this->addCuffLinks($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::PIERCINGS->value) {
                $this->addPiercings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::EARRINGS->value) {
                $this->addEarrings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::RINGS->value) {
                $this->addRings($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::BRACELETS->value) {
                $this->addBracelets($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::CHAINS->value) {
                $this->addChains($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::NECKLACES->value) {
                $this->addNecklaces($jewelleryData, $jewelleryId);
            }
        }

        if ($jewelleryData['property']) {
            if ($jewelleryData['category'] === JewelleryCategoryBuilderEnum::BEADS->value) {
                $this->addBeads($jewelleryData, $jewelleryId);
            }
        }
    }

    /**
     * @throws JsonException
     */
    private function addBrooches(array $jewelleryData, int $jewelleryId): void
    {
        $broochClaspId = DB::table(BroochClaspEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['broochClasp'])->value('id');
        $broochTypeId  = DB::table(BroochTypeEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['broochType'])->value('id');

        DB::table(BroochEnum::TABLE_NAME->value)->insertGetId([
            'id'              => $jewelleryId,
            'brooch_clasp_id' => $broochClaspId,
            'brooch_type_id'  => $broochTypeId,
            'quantity'        => $jewelleryData['property']['parameters']['quantity'],
            'price'           => $jewelleryData['property']['parameters']['price'],
            'dimensions'      => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at'      => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addCharmPendants(array $jewelleryData, int $jewelleryId): void
    {
        DB::table(CharmPendantEnum::TABLE_NAME->value)->insertGetId([
            'id'         => $jewelleryId,
            'quantity'   => $jewelleryData['property']['parameters']['quantity'],
            'price'      => $jewelleryData['property']['parameters']['price'],
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
            'id'         => $jewelleryId,
            'quantity'   => $jewelleryData['property']['parameters']['quantity'],
            'price'      => $jewelleryData['property']['parameters']['price'],
            'dimensions' => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at' => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addTieClips(array $jewelleryData, int $jewelleryId): void
    {
        $tieClipTypeId = DB::table(TieClipTypeEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['tieClipType'])->value('id');

        DB::table(TieClipEnum::TABLE_NAME->value)->insertGetId([
            'id'               => $jewelleryId,
            'tie_clip_type_id' => $tieClipTypeId,
            'quantity'         => $jewelleryData['property']['parameters']['quantity'],
            'price'            => $jewelleryData['property']['parameters']['price'],
            'dimensions'       => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at'       => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addCuffLinks(array $jewelleryData, int $jewelleryId): void
    {
        $cuffLinkClaspId = DB::table(CuffLinkClaspEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['cuffLinkClasp'])->value('id');
        $cuffLinkFormId  = DB::table(CuffLinkFormEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['cuffLinkForm'])->value('id');
        $cuffLinkTypeId  = DB::table(CuffLinkTypeEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['cuffLinkType'])->value('id');

        DB::table(CuffLinkEnum::TABLE_NAME->value)->insertGetId([
            'id'                 => $jewelleryId,
            'cuff_link_clasp_id' => $cuffLinkClaspId,
            'cuff_link_form_id'  => $cuffLinkFormId,
            'cuff_link_type_id'  => $cuffLinkTypeId,
            'quantity'           => $jewelleryData['property']['parameters']['quantity'],
            'price'              => $jewelleryData['property']['parameters']['price'],
            'dimensions'         => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at'         => now()
        ]);
    }

    private function addPiercings(array $jewelleryData, int $jewelleryId): void
    {
        $piercingTypeId = DB::table(PiercingTypeEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['piercingType'])->value('id');

        DB::table(PiercingEnum::TABLE_NAME->value)->insertGetId([
            'id'               => $jewelleryId,
            'piercing_type_id' => $piercingTypeId,
            'quantity'         => $jewelleryData['property']['parameters']['quantity'],
            'price'            => $jewelleryData['property']['parameters']['price'],
            'created_at'       => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addEarrings(array $jewelleryData, int $jewelleryId): void
    {
        $claspId = DB::table(EarringClaspEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['clasp'])->value('id');
        $typeId  = DB::table(EarringTypeEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['earring_type'])->value('id');

        $earringId = DB::table(EarringEnum::TABLE_NAME->value)->insertGetId([
            'jewellery_id'     => $jewelleryId,
            'earring_clasp_id' => $claspId,
            'quantity'         => $jewelleryData['property']['parameters']['quantity'],
            'price'            => $jewelleryData['property']['parameters']['price'],
            'dimensions'       => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at'       => now()
        ]);

        DB::table(EarringEarringTypeEnum::TABLE_NAME->value)->insertGetId([
            'earring_id'      => $earringId,
            'earring_type_id' => $typeId,
            'created_at'      => now()
        ]);
    }

    /**
     * @throws JsonException
     */
    private function addRings(array $jewelleryData, int $jewelleryId): void
    {
        $ringTypeId = DB::table(RingTypeEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['ring_type'])
            ->value('id');


        $ringId = DB::table(RingEnum::TABLE_NAME->value)->insertGetId([
            'id'           => $jewelleryId,
            'ring_type_id' => $ringTypeId,
            'dimensions'   => json_encode($jewelleryData['property']['parameters']['dimensions'], JSON_THROW_ON_ERROR),
            'created_at'   => now()
        ]);

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {

            DB::table(RingMetricEnum::TABLE_NAME->value)->insertGetId([
                'ring_id'      => $ringId,
                'ring_size_id' => DB::table('jw_properties.ring_sizes')->where('value', $sizePriceQuantity['size'])->value('id'),
                'quantity'     => $sizePriceQuantity['quantity'],
                'price'        => $sizePriceQuantity['price'],
                'created_at'   => now()
            ]);
        }
//        dd($jewelleryData);
//        foreach ($jewelleryData['property']['parameters'] as $ringType) {
//            dd($ringType);
        DB::table(RingDetailEnum::TABLE_NAME->value)->insertGetId([
            'ring_id'          => $ringId,
            'ring_specific_id' => DB::table('jw_properties.ring_specifics')
                ->where('name', $jewelleryData['property']['parameters']['ring_specific'])->value('id'),
            'created_at'       => now()
        ]);
//        }
    }

    private function addBracelets(array $jewelleryData, int $jewelleryId): void
    {
        $bodyPartId = DB::table(BodyPartEnum::TABLE_NAME->value)
            ->where('name', $jewelleryData['property']['parameters']['body_part'])
            ->value('id');

        $braceletId = DB::table(BraceletEnum::TABLE_NAME->value)->insertGetId([
            'id'               => $jewelleryId,
            'body_part_id'     => $bodyPartId,
            'clasp_id'         => DB::table(ClaspEnum::TABLE_NAME->value)
                ->where('name', $jewelleryData['property']['parameters']['clasp'])->value('id'),
            'bracelet_type_id' => DB::table(BraceletTypeEnum::TABLE_NAME->value)
                ->where('name', $jewelleryData['property']['parameters']['bracelet_types'])->value('id'),
            'created_at'       => now()
        ]);

        if ($jewelleryData['property']['parameters']['weaving']) {
            DB::table(BraceletWeavingEnum::TABLE_NAME->value)->insertGetId([
                'bracelet_id' => $braceletId,
                'weaving_id'  => DB::table(WeavingEnum::TABLE_NAME->value)
                    ->where('name', $jewelleryData['property']['parameters']['weaving']['weaving'])
                    ->value('id'),
                'fullness'    => $jewelleryData['property']['parameters']['weaving']['fullness'],
                'diameter'    => $jewelleryData['property']['parameters']['weaving']['wire_diameter'],
                'created_at'  => now()
            ]);
        }

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {

            DB::table(BraceletMetricEnum::TABLE_NAME->value)->insertGetId([
                'bracelet_id'      => $braceletId,
                'bracelet_size_id' => DB::table(BraceletSizeEnum::TABLE_NAME->value)
                    ->where('value', $sizePriceQuantity['size'])->value('id'),
                'quantity'         => $sizePriceQuantity['quantity'],
                'price'            => $sizePriceQuantity['price'],
                'created_at'       => now()
            ]);
        }
    }

    private function addChains(array $jewelleryData, int $jewelleryId): void
    {
        $chainId = DB::table(ChainEnum::TABLE_NAME->value)->insertGetId([
            'id'         => $jewelleryId,
            'clasp_id'   => DB::table(ClaspEnum::TABLE_NAME->value)->where('name', $jewelleryData['property']['parameters']['clasp'])->value('id'),
            'created_at' => now()
        ]);

        if ($jewelleryData['property']['parameters']['weaving']) {
            DB::table(ChainWeavingEnum::TABLE_NAME->value)->insertGetId([
                'chain_id'   => $chainId,
                'weaving_id' => DB::table(WeavingEnum::TABLE_NAME->value)
                    ->where('name', $jewelleryData['property']['parameters']['weaving']['weaving'])
                    ->value('id'),
                'fullness'   => $jewelleryData['property']['parameters']['weaving']['fullness'],
                'diameter'   => $jewelleryData['property']['parameters']['weaving']['wire_diameter'],
                'created_at' => now()
            ]);
        }

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {

            DB::table(ChainMetricEnum::TABLE_NAME->value)->insertGetId([
                'chain_id'     => $chainId,
                'neck_size_id' => DB::table(NeckSizeEnum::TABLE_NAME->value)
                    ->where('value', $sizePriceQuantity['size'])->value('id'),
                'quantity'     => $sizePriceQuantity['quantity'],
                'price'        => $sizePriceQuantity['price'],
                'created_at'   => now()
            ]);
        }
    }

    private function addNecklaces(array $jewelleryData, int $jewelleryId): void
    {
        $necklaceId = DB::table(NecklaceEnum::TABLE_NAME->value)->insertGetId([
            'id'         => $jewelleryId,
            'clasp_id'   => DB::table(ClaspEnum::TABLE_NAME->value)
                ->where('name', $jewelleryData['property']['parameters']['clasp'])->value('id'),
            'created_at' => now()
        ]);

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
            DB::table(NecklaceMetricEnum::TABLE_NAME->value)->insertGetId([
                'necklace_id'  => $necklaceId,
                'neck_size_id' => DB::table(NeckSizeEnum::TABLE_NAME->value)
                    ->where('value', $sizePriceQuantity['size'])->value('id'),
                'quantity'     => $sizePriceQuantity['quantity'],
                'price'        => $sizePriceQuantity['price'],
                'created_at'   => now()
            ]);
        }
    }

    private function addBeads(array $jewelleryData, int $jewelleryId): void
    {
        $beadId = DB::table(BeadEnum::TABLE_NAME->value)->insertGetId([
            'id'           => $jewelleryId,
            'clasp_id'     => DB::table(ClaspEnum::TABLE_NAME->value)
                ->where('name', $jewelleryData['property']['parameters']['clasp'])->value('id'),
            'bead_base_id' => DB::table(BeadBaseEnum::TABLE_NAME->value)
                ->where('name', $jewelleryData['property']['parameters']['bead_bases'])->value('id'),
            'created_at'   => now()
        ]);

        foreach ($jewelleryData['property']['parameters']['size_price_quantity'] as $sizePriceQuantity) {
            DB::table(BeadMetricEnum::TABLE_NAME->value)->insert([
                'bead_id'      => $beadId,
                'neck_size_id' => DB::table(NeckSizeEnum::TABLE_NAME->value)->where('value', $sizePriceQuantity['size'])->value('id'),
                'quantity'     => $sizePriceQuantity['quantity'],
                'price'        => $sizePriceQuantity['price'],
                'created_at'   => now()
            ]);
        }
    }

    private function addMetals(array $jewelleryData, int $jewelleryId): void
    {
        foreach ($jewelleryData['preciousMetals'] as $preciousMetal) {

            $metalId    = DB::table(PreciousMetalEnum::TABLE_NAME->value)->where('name', $preciousMetal['preciousMetal'])->value('id');
            $hallmarkId = DB::table(HallmarkEnum::TABLE_NAME->value)->where('value', $preciousMetal['hallmark'])->value('id');

            DB::table(JewelleryMetalEnum::TABLE_NAME->value)->insert([
                'jewellery_id'      => $jewelleryId,
                'hallmark_id'       => $hallmarkId,
                'precious_metal_id' => $metalId,
                'created_at'        => now()
            ]);
        }
    }

    private function addCoverages(array $jewelleryData, int $jewelleryId): void
    {
        foreach ($jewelleryData['coverages'] as $coverage) {

            $coverageId = DB::table(CoverageEnum::TABLE_NAME->value)->where('name', $coverage)->value('id');

            DB::table(JewelleryCoverageEnum::TABLE_NAME->value)->insert([
                'jewellery_id' => $jewelleryId,
                'coverage_id'  => $coverageId,
                'created_at'   => now()
            ]);
        }
    }

    private function addMediaCatalog(array $jewelleryData, int $jewelleryId): void
    {
        $videoTypes = DB::table(VideoTypeEnum::TABLE_NAME->value)->get();

        foreach ($jewelleryData['media']['catalog'] as $mediaType => $media) {
            if ($mediaType == 'pictures') {
                foreach ($media as $mediaItem) {
                    $mediaItemId = DB::table(CatalogMediaEnum::TABLE_NAME->value)->insertGetId([
                        'jewellery_id'  => $jewelleryId,
                        'media_type_id' => DB::table(MediaTypeEnum::TABLE_NAME->value)->where('name', $mediaType)->value('id'),
                        'name'          => $mediaItem,
                        'slug'          => Str::slug($mediaItem, '-'),
                        'is_active'     => true,
                        'created_at'    => now()
                    ]);
                    $ext         = rand(0, 1) ? 'png' : 'jpeg';
                    DB::table(CatalogPictureEnum::TABLE_NAME->value)->insert([
                        'id'         => $mediaItemId,
                        'alt_name'   => $jewelleryData['jewelleryItem']['name'],
                        'src'        => 'https://server/' . $mediaItem . '.' . $ext,
                        'extension'  => $ext,
                        'is_active'  => true,
                        'created_at' => now()
                    ]);
                }
            } else {
                foreach ($media as $mediaItem) {
                    $mediaItemId = DB::table(CatalogMediaEnum::TABLE_NAME->value)->insertGetId([
                        'jewellery_id'  => $jewelleryId,
                        'media_type_id' => DB::table(MediaTypeEnum::TABLE_NAME->value)->where('name', $mediaType)->value('id'),
                        'name'          => $mediaItem,
                        'slug'          => Str::slug($mediaItem, '-'),
                        'is_active'     => true,
                        'created_at'    => now()
                    ]);

                    $jewelleryVideoId = DB::table(CatalogVideoEnum::TABLE_NAME->value)->insertGetId([
                        'id'         => $mediaItemId,
                        'alt_name'   => $jewelleryData['jewelleryItem']['name'],
                        'is_active'  => true,
                        'created_at' => now()
                    ]);

                    foreach ($videoTypes as $videoType) {
                        DB::table(CatalogVideoDetailEnum::TABLE_NAME->value)->insert([
                            'catalog_video_id' => $jewelleryVideoId,
                            'video_type_id'    => $videoType->id,
                            'src'              => 'https://server/' . $mediaItem . '.' . $videoType->extension,
                            'created_at'       => now()
                        ]);
                    }
                }
            }
        }
    }

    private function addMediaReview(array $jewelleryData, int $jewelleryId): void
    {
        $videoTypes = DB::table(VideoTypeEnum::TABLE_NAME->value)->get();

        foreach ($jewelleryData['media']['reviews'] as $mediaType => $media) {
            if ($mediaType == 'pictures') {
                foreach ($media as $mediaItem) {
                    $mediaItemId = DB::table(ReviewMediaEnum::TABLE_NAME->value)->insertGetId([
                        'jewellery_id'  => $jewelleryId,
                        'media_type_id' => DB::table(MediaTypeEnum::TABLE_NAME->value)->where('name', $mediaType)->value('id'),
                        'name'          => $mediaItem,
                        'slug'          => Str::slug($mediaItem, '-'),
                        'is_active'     => true,
                        'created_at'    => now()
                    ]);
                    $ext         = rand(0, 1) ? 'png' : 'jpeg';
                    DB::table(ReviewPictureEnum::TABLE_NAME->value)->insert([
                        'id'         => $mediaItemId,
                        'alt_name'   => $jewelleryData['jewelleryItem']['name'],
                        'src'        => 'https://server/' . $mediaItem . '.' . $ext,
                        'extension'  => $ext,
                        'is_active'  => true,
                        'created_at' => now()
                    ]);
                }
            } else {
                foreach ($media as $mediaItem) {
                    $mediaItemId = DB::table(ReviewMediaEnum::TABLE_NAME->value)->insertGetId([
                        'jewellery_id'  => $jewelleryId,
                        'media_type_id' => DB::table(MediaTypeEnum::TABLE_NAME->value)->where('name', $mediaType)->value('id'),
                        'name'          => $mediaItem,
                        'slug'          => Str::slug($mediaItem, '-'),
                        'is_active'     => true,
                        'created_at'    => now()
                    ]);

                    $reviewVideoId = DB::table(ReviewVideoEnum::TABLE_NAME->value)->insertGetId([
                        'id'         => $mediaItemId,
                        'alt_name'   => $jewelleryData['jewelleryItem']['name'],
                        'is_active'  => true,
                        'created_at' => now()
                    ]);

                    foreach ($videoTypes as $videoType) {
                        DB::table(ReviewVideoDetailEnum::TABLE_NAME->value)->insert([
                            'review_video_id' => $reviewVideoId,
                            'video_type_id'   => $videoType->id,
                            'src'             => 'https://server/' . $mediaItem . '.' . $videoType->extension,
                            'created_at'      => now()
                        ]);
                    }
                }
            }
        }
    }
}
