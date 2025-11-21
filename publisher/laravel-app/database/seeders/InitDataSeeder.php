<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\NaturalStones\Enums\NaturalStoneEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectEnum;
use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneEnum;
use Domain\Inserts\StoneExteriours\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupEnum;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginEnum;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeListEnum;
use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerListEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeListEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeListEnum;
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
        DB::table('jw_properties.bracelet_sizes')->truncate();
        DB::table(WeavingEnum::TABLE_NAME->value)->truncate();
        DB::table(BaseWeavingEnum::TABLE_NAME->value)->truncate();
        DB::table('jw_properties.bracelets')->truncate();
        DB::table('jw_properties.body_parts')->truncate();
        DB::table('jw_properties.bracelet_bases')->truncate();
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
        DB::table('jw_medias.pictures')->truncate();
        DB::table('jw_medias.video_details')->truncate();
        DB::table('jw_medias.videos')->truncate();
        DB::table('jw_medias.video_types')->truncate();
        DB::table('jw_medias.producers')->truncate();
        DB::table(TypeOriginEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneEnum::TABLE_NAME->value)->truncate();
        DB::table(OpticalEffectEnum::TABLE_NAME->value)->truncate();
        DB::table(OpticalEffectStoneEnum::TABLE_NAME->value)->truncate();
        DB::table(ColourEnum::TABLE_NAME->value)->truncate();
        DB::table(FacetEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneExteriorEnum::TABLE_NAME->value)->truncate();
        DB::table(InsertOptionalInfoEnum::TABLE_NAME->value)->truncate();
        DB::table(InsertEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneFamilyEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneGroupEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneGradeEnum::TABLE_NAME->value)->truncate();
        DB::table(NaturalStoneEnum::TABLE_NAME->value)->truncate();
        DB::table(GroupGradeEnum::TABLE_NAME->value)->truncate();
        DB::table(GrownStoneEnum::TABLE_NAME->value)->truncate();
        DB::table(ImitationStoneEnum::TABLE_NAME->value)->truncate();
        DB::table(JewelleryEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        $body_parts = config('data-seed.data_items.body_parts');
        $promotions = config('data-seed.data_items.jw_promotions');

        $this->jwInsertsSeed();
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

        foreach ($body_parts as $body_part) {
            DB::table('jw_properties.body_parts')->insert([
                'name' => $body_part,
                'slug' => Str::slug($body_part),
                'created_at' => now(),
            ]);
        }

        foreach (RingTypeListEnum::cases() as $type) {
            DB::table(RingTypeEnum::TABLE_NAME->value)->insert([
                'name' => $type->value,
                'slug' => Str::slug($type->value),
                'description' => $type->description(),
                'created_at' => now(),
            ]);
        }

        foreach (RingFingerListEnum::cases() as $type) {
            DB::table(RingFingerEnum::TABLE_NAME->value)->insert([
                'name' => $type->value,
                'slug' => Str::slug($type->value),
                'created_at' => now(),
            ]);
        }

        foreach (RingSizeListEnum::cases() as $ringSize) {
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

        foreach (BraceletSizeListEnum::cases() as $bracelet_size) {
            DB::table('jw_properties.bracelet_sizes')->insert([
                'value'      => $bracelet_size->value,
                'unit'       => $bracelet_size->unitMeasurement(),
                'annotation' => $bracelet_size->wrist(),
                'created_at' => now(),
            ]);
        }
    }

    private function jwInsertsSeed(): void
    {
        $jwInsertsStoneFamilies = config('data-seed.insert-seed.items-seed.family');
        $jwInsertsOpticalEffects = config('data-seed.insert-seed.items-seed.optical_effects');
        $jwInsertsNaturalStones = config('data-seed.insert-seed.nature-stones-seed.stones');
        $jwInsertsGrownStones = config('data-seed.insert-seed.grown-stones-seed.stones');
        $jwInsertsImitationStones = config('data-seed.insert-seed.imitation-stones-seed.stones');

        foreach ($jwInsertsOpticalEffects as $effect) {
            DB::table('jw_inserts.optical_effects')->insert([
                'name' => $effect['name'],
                'slug' => Str::slug($effect['name']),
                'description' => $effect['description'],
                'created_at' => now(),
            ]);
        }

        foreach ($jwInsertsStoneFamilies as $family) {
            DB::table('jw_inserts.stone_families')->insert([
                'name' => $family['name'],
                'slug' => Str::slug($family['name']),
                'description' => $family['description'],
                'created_at' => now(),
            ]);
        }

        $typeOriginId = DB::table('jw_inserts.type_origins')->where('name', '=', 'природный')->value('id');
        foreach ($jwInsertsNaturalStones as $stone) {
            $stoneId = DB::table('jw_inserts.stones')->insertGetId([
                'type_origin_id' => $typeOriginId,
                'name' => $stone['name'],
                'alt_name' => $stone['alt_name'],
                'slug' => Str::slug($stone['name']),
                'description' => $stone['description'],
                'created_at' => now(),
            ]);

            if ($stone['optical_effect']) {
                $opticalEffectId = DB::table('jw_inserts.optical_effects')
                    ->where('name', $stone['optical_effect'])->value('id');

                DB::table('jw_inserts.optical_effect_stone')->insert([
                    'id' => $stoneId,
                    'optical_effect_id' => $opticalEffectId,
                    'created_at' => now(),
                ]);
            }
            $naturalStoneId = DB::table('jw_inserts.natural_stones')->insertGetId([
                'id' => $stoneId,
                'stone_group_id' => DB::table('jw_inserts.stone_groups')->where('name', $stone['group'])->value('id'),
                'stone_family_id' => DB::table('jw_inserts.stone_families')->where('name', $stone['family'])->value('id'),
                'created_at' => now(),
            ]);
        }

        $typeGrownId = DB::table('jw_inserts.type_origins')->where('name', '=', 'выращенный')->value('id');
        foreach ($jwInsertsGrownStones as $stone) {
            $stoneId = DB::table('jw_inserts.stones')->insertGetId([
                'type_origin_id' => $typeGrownId,
                'name' => $stone['name'],
                'alt_name' => $stone['alt_name'],
                'slug' => Str::slug($stone['name']),
                'description' => $stone['description'],
                'created_at' => now(),
            ]);

            if ($stone['optical_effect']) {
                DB::table('jw_inserts.optical_effect_stone')->insert([
                    'id' => $stoneId,
                    'optical_effect_id' => DB::table('jw_inserts.optical_effects')
                        ->where('name', $stone['optical_effect'])->value('id'),
                    'created_at' => now(),
                ]);
            }

            DB::table('jw_inserts.grown_stones')->insertGetId([
                'id' => $stoneId,
                'stone_family_id' => DB::table('jw_inserts.stone_families')->where('name', $stone['family'])->value('id'),
                'created_at' => now(),
            ]);
        }

        $typeImitationId = DB::table('jw_inserts.type_origins')->where('name', '=', 'имитация')->value('id');
        foreach ($jwInsertsImitationStones as $stone) {
            $stoneId = DB::table('jw_inserts.stones')->insertGetId([
                'type_origin_id' => $typeImitationId,
                'name' => $stone['name'],
                'alt_name' => $stone['alt_name'],
                'slug' => Str::slug($stone['name']),
                'description' => $stone['description'],
                'created_at' => now(),
            ]);

            if ($stone['optical_effect']) {
                DB::table('jw_inserts.optical_effect_stone')->insert([
                    'stone_id' => $stoneId,
                    'optical_effect_id' => DB::table('jw_inserts.optical_effects')
                        ->where('name', $stone['optical_effect'])->value('id'),
                    'created_at' => now(),
                ]);
            }

            DB::table('jw_inserts.imitation_stones')->insertGetId([
                'id' => $stoneId,
                'description' => fake()->text(),
                'created_at' => now(),
            ]);
        }
    }

    private function jwMediasSeed(): void
    {
        $jwMediaProducers = config('data-seed.data_items.medias.jw_media_producers');
        $jwMediaVideoTypes = config('data-seed.data_items.medias.jw_video_types');

        foreach ($jwMediaProducers as $producer) {
            DB::table('jw_medias.producers')->insert([
                'name' => $producer,
                'slug' => Str::slug($producer),
                'created_at' => now(),
            ]);
        }

        foreach ($jwMediaVideoTypes as $videoType) {
            DB::table('jw_medias.video_types')->insert([
                'type' => $videoType['name'],
                'extension' => $videoType['extension'],
                'created_at' => now(),
            ]);
        }
    }
}
