<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\NaturalStones\Enums\NatureStoneEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourEnum;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupEnum;
use Domain\Inserts\StoneOpticalEffects\Enums\StoneOpticalEffectEnum;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginEnum;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use Domain\JewelleryProperties\Brooches\BroochClasps\Enums\BroochClaspBuilderEnum;
use Domain\JewelleryProperties\Brooches\BroochClasps\Enums\BroochClaspEnum;
use Domain\JewelleryProperties\Brooches\BroochTypes\Enums\BroochTypeBuilderEnum;
use Domain\JewelleryProperties\Brooches\BroochTypes\Enums\BroochTypeEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspBuilderEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkForms\Enums\CuffLinkFormBuilderEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkForms\Enums\CuffLinkFormEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkTypes\Enums\CuffLinkTypeBuilderEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkTypes\Enums\CuffLinkTypeEnum;
use Domain\JewelleryProperties\Piercings\PiercingSuitable\Enums\PiercingSuitableEnum;
use Domain\JewelleryProperties\Piercings\PiercingSites\Enums\PiercingSiteBuilderEnum;
use Domain\JewelleryProperties\Piercings\PiercingSites\Enums\PiercingSiteEnum;
use Domain\JewelleryProperties\Piercings\PiercingTypes\Enums\PiercingTypeBuilderEnum;
use Domain\JewelleryProperties\Piercings\PiercingTypes\Enums\PiercingTypeEnum;
use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerBuilderEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeEnum;
use Domain\JewelleryProperties\TieClips\TieClipTypes\Enums\TieClipTypeBuilderEnum;
use Domain\JewelleryProperties\TieClips\TieClipTypes\Enums\TieClipTypeEnum;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeBuilderEnum;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameBuilderEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeBuilderEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('jw_properties.bead_metrics')->truncate();
        DB::table('jw_properties.beads')->truncate();
        DB::table('jw_properties.bead_bases')->truncate();
        DB::table('jw_properties.necklace_metrics')->truncate();
        DB::table('jw_properties.necklaces')->truncate();
        DB::table('jw_properties.chain_weavings')->truncate();
        DB::table('jw_properties.chain_metrics')->truncate();
        DB::table('jw_properties.chains')->truncate();
        DB::table('jw_properties.neck_sizes')->truncate();
        DB::table('jw_properties.length_names')->truncate();
        DB::table('jw_properties.bracelet_weavings')->truncate();
        DB::table('jw_properties.bracelet_metrics')->truncate();
        DB::table(BraceletSizeEnum::TABLE_NAME->value)->truncate();
        DB::table(WeavingEnum::TABLE_NAME->value)->truncate();
        DB::table(BaseWeavingEnum::TABLE_NAME->value)->truncate();
        DB::table('jw_properties.bracelets')->truncate();
        DB::table('jw_properties.body_parts')->truncate();
        DB::table('jw_properties.bracelet_types')->truncate();
        DB::table('jw_properties.clasps')->truncate();
        DB::table('jw_properties.ring_metrics')->truncate();
        DB::table('jw_properties.rings')->truncate();
        DB::table('jw_properties.ring_sizes')->truncate();
        DB::table(RingTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(RingDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(RingFingerEnum::TABLE_NAME->value)->truncate();
        DB::table('jw_properties.earrings')->truncate();
        DB::table('jw_properties.earring_types')->truncate();
        DB::table('jw_properties.earrings')->truncate();
        DB::table('jw_properties.earring_clasps')->truncate();
        DB::table('jw_properties.piercings')->truncate();
        DB::table('jw_properties.charm_pendants')->truncate();
        DB::table('jw_properties.pendants')->truncate();
        DB::table('jw_properties.cuff_links')->truncate();
        DB::table('jw_properties.tie_clips')->truncate();
        DB::table('jw_properties.brooches')->truncate();
        DB::table('jw_promotions.jewellery_promotion')->truncate();
        DB::table('jw_promotions.promotions')->truncate();
        DB::table('jw_medias.video_types')->truncate();
        DB::table(TypeOriginEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneEnum::TABLE_NAME->value)->truncate();
        DB::table(OpticalEffectEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneOpticalEffectEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneColourEnum::TABLE_NAME->value)->truncate();
        DB::table(FacetEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneExteriorEnum::TABLE_NAME->value)->truncate();
        DB::table(InsertOptionalInfoEnum::TABLE_NAME->value)->truncate();
        DB::table(InsertEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneFamilyEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneGroupEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneGradeEnum::TABLE_NAME->value)->truncate();
        DB::table(NatureStoneEnum::TABLE_NAME->value)->truncate();
        DB::table(GroupGradeEnum::TABLE_NAME->value)->truncate();
        DB::table(GrownStoneEnum::TABLE_NAME->value)->truncate();
        DB::table(ImitationStoneEnum::TABLE_NAME->value)->truncate();
        DB::table(JewelleryEnum::TABLE_NAME->value)->truncate();
        DB::table(CuffLinkClaspEnum::TABLE_NAME->value)->truncate();
        DB::table(CuffLinkFormEnum::TABLE_NAME->value)->truncate();
        DB::table(CuffLinkTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(BroochTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(BroochClaspEnum::TABLE_NAME->value)->truncate();
        DB::table(TieClipTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(PiercingTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(PiercingSiteEnum::TABLE_NAME->value)->truncate();
        DB::table(PiercingSuitableEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();
//        dd(DB::table(BraceletSizeEnum::TABLE_NAME->value)->get());
//        $body_parts = config('data-seed.data_items.body_parts');
        $promotions = config('data-seed.data_items.jw_promotions');

        $this->jwMediasSeed();

        foreach ($promotions as $promotion) {
            DB::table('jw_promotions.promotions')->insert([
                'name' => $promotion['name'],
                'description' => $promotion['description'],
                'slug' => Str::slug($promotion['name']),
                'rate' => $promotion['rate'],
                'is_active' => true,
                'created_at' => now(),
            ]);
        }
        $body_parts = ['запястье', 'щиколотка'];
        foreach ($body_parts as $body_part) {
            DB::table('jw_properties.body_parts')->insert([
                'name' => $body_part,
                'slug' => Str::slug($body_part),
                'created_at' => now(),
            ]);
        }

        foreach (RingTypeBuilderEnum::cases() as $type) {
            DB::table(RingTypeEnum::TABLE_NAME->value)->insert([
                'name' => $type->value,
                'slug' => Str::slug($type->value),
                'description' => $type->description(),
                'created_at' => now(),
            ]);
        }

        foreach (RingFingerBuilderEnum::cases() as $type) {
            DB::table(RingFingerEnum::TABLE_NAME->value)->insert([
                'name' => $type->value,
                'slug' => Str::slug($type->value),
                'created_at' => now(),
            ]);
        }

        foreach (RingSizeBuilderEnum::cases() as $ringSize) {
            DB::table('jw_properties.ring_sizes')->insert([
                'value' => $ringSize->value,
                'unit' => $ringSize->unitMeasurement(),
                'created_at' => now(),
            ]);
        }

        foreach (LengthNameBuilderEnum::cases() as $length_name) {
            DB::table('jw_properties.length_names')->insert([
                'name' => $length_name->value,
                'slug' => Str::slug($length_name->value),
                'description' => $length_name->description()
            ]);
        }

        foreach (NeckSizeBuilderEnum::cases() as $size) {
            DB::table('jw_properties.neck_sizes')->insert([
                'length_name_id' => DB::table('jw_properties.length_names')->where('name', $size->lengthNames())->value('id'),
                'value' => $size->value,
                'unit' => $size->unitMeasurement(),
                'created_at' => now(),
            ]);
        }

        foreach (BraceletSizeBuilderEnum::cases() as $bracelet_size) {
            DB::table('jw_properties.bracelet_sizes')->insert([
                'value'      => $bracelet_size->value,
                'unit'       => $bracelet_size->unitMeasurement(),
                'annotation' => $bracelet_size->wrist(),
                'created_at' => now(),
            ]);
        }

        foreach (CuffLinkClaspBuilderEnum::cases() as $cuff_link_clasp) {
            DB::table(CuffLinkClaspEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_clasp->value,
                'slug'        => Str::slug($cuff_link_clasp->value, '-'),
                'description' => $cuff_link_clasp->description(),
                'created_at'  => now()
            ]);
        }

        foreach (CuffLinkFormBuilderEnum::cases() as $cuff_link_form) {
            DB::table(CuffLinkFormEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_form->value,
                'slug'        => Str::slug($cuff_link_form->value, '-'),
                'description' => $cuff_link_form->description(),
                'created_at'  => now()
            ]);
        }

        foreach (CuffLinkTypeBuilderEnum::cases() as $cuff_link_clasp) {
            DB::table(CuffLinkTypeEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_clasp->value,
                'slug'        => Str::slug($cuff_link_clasp->value, '-'),
                'description' => $cuff_link_clasp->description(),
                'created_at'  => now()
            ]);
        }

        foreach (BroochClaspBuilderEnum::cases() as $cuff_link_form) {
            DB::table(BroochClaspEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_form->value,
                'slug'        => Str::slug($cuff_link_form->value, '-'),
                'description' => $cuff_link_form->description(),
                'created_at'  => now()
            ]);
        }

        foreach (BroochTypeBuilderEnum::cases() as $cuff_link_type) {
            DB::table(BroochTypeEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_type->value,
                'slug'        => Str::slug($cuff_link_type->value, '-'),
                'description' => $cuff_link_type->description(),
                'created_at'  => now()
            ]);
        }

        foreach (TieClipTypeBuilderEnum::cases() as $tie_clip_type) {
            DB::table(TieClipTypeEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $tie_clip_type->value,
                'slug'        => Str::slug($tie_clip_type->value, '-'),
                'description' => $tie_clip_type->description(),
                'created_at'  => now()
            ]);
        }

        foreach (PiercingSiteBuilderEnum::cases() as $piercing_site) {
            $piercingSiteId = DB::table(PiercingSiteEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $piercing_site->value,
                'slug'        => Str::slug($piercing_site->value, '-'),
                'description' => $piercing_site->description(),
                'created_at'  => now()
            ]);
        }

        foreach (PiercingTypeBuilderEnum::cases() as $piercing_type) {
            $piercingTypeId = DB::table(PiercingTypeEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $piercing_type->value,
                'slug'        => Str::slug($piercing_type->value, '-'),
                'description' => $piercing_type->description(),
                'created_at'  => now()
            ]);
            foreach ($piercing_type->suitable() as $suitable) {
//                dd($suitable);
                DB::table(PiercingSuitableEnum::TABLE_NAME->value)->insertGetId([
                    'piercing_type_id'        => $piercingTypeId,
                    'piercing_site_id'        => DB::table(PiercingSiteEnum::TABLE_NAME->value)
                        ->where('name', $suitable)->value('id'),
                    'created_at'  => now()
                ]);
            }
        }
    }

    private function jwMediasSeed(): void
    {
        foreach (VideoTypeBuilderEnum::cases() as $videoType) {
            DB::table(VideoTypeEnum::TABLE_NAME->value)->insert([
                'type' => $videoType->value,
                'extension' => $videoType->extension(),
                'created_at' => now(),
            ]);
        }
    }
}
