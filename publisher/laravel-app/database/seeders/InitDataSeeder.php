<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class InitDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('properties.jw_bead_metrics')->truncate();
        DB::table('properties.jw_bead_props')->truncate();
        DB::table('properties.bead_sizes')->truncate();
        DB::table('properties.bead_bases')->truncate();
        DB::table('properties.jw_necklace_metrics')->truncate();
        DB::table('properties.jw_necklace_props')->truncate();
        DB::table('properties.necklace_sizes')->truncate();
        DB::table('properties.jw_chain_weavings')->truncate();
        DB::table('properties.jw_chain_metrics')->truncate();
        DB::table('properties.jw_chain_props')->truncate();
        DB::table('properties.chain_sizes')->truncate();
        DB::table('properties.length_names')->truncate();
        DB::table('properties.jw_bracelet_weavings')->truncate();
        DB::table('properties.jw_bracelet_metrics')->truncate();
        DB::table('properties.bracelet_sizes')->truncate();
        DB::table('properties.jw_weavings')->truncate();
        DB::table('properties.jw_bracelet_props')->truncate();
        DB::table('properties.body_parts')->truncate();
        DB::table('properties.bracelet_bases')->truncate();
        DB::table('properties.jw_clasps')->truncate();
        DB::table('properties.jw_ring_metrics')->truncate();
        DB::table('properties.jw_ring_props')->truncate();
        DB::table('properties.ring_sizes')->truncate();
        DB::table('properties.jw_earrings')->truncate();
        DB::table('properties.earring_types')->truncate();
        DB::table('properties.jw_earring_props')->truncate();
        DB::table('properties.earring_clasps')->truncate();
        DB::table('properties.jw_piercing_props')->truncate();
        DB::table('properties.jw_charm_pendant_props')->truncate();
        DB::table('properties.jw_pendant_props')->truncate();
        DB::table('properties.jw_cuff_link_props')->truncate();
        DB::table('properties.jw_tie_clip_props')->truncate();
        DB::table('properties.jw_brooch_props')->truncate();
        DB::table('promotions.jewellery_jw_promotion')->truncate();
        DB::table('promotions.jw_promotions')->truncate();
        DB::table('jw_coverages.coverage_jewellery')->truncate();
        DB::table('jw_coverages.coverages')->truncate();
        DB::table('jw_coverages.coverage_types')->truncate();
        DB::table('medias.jw_set_pictures')->truncate();
        DB::table('medias.jw_pictures')->truncate();
        DB::table('medias.jw_set_video_types')->truncate();
        DB::table('medias.jw_set_videos')->truncate();
        DB::table('medias.jw_videos')->truncate();
        DB::table('medias.video_types')->truncate();
        DB::table('medias.jw_medias')->truncate();
        DB::table('medias.jw_media_producers')->truncate();
        DB::table('medias.jw_media_categories')->truncate();
        DB::table('jw_inserts.type_origins')->truncate();
        DB::table('jw_inserts.stones')->truncate();
        DB::table('jw_inserts.optical_effects')->truncate();
        DB::table('jw_inserts.optical_effect_stone')->truncate();
        DB::table('jw_inserts.colours')->truncate();
        DB::table('jw_inserts.facets')->truncate();
        DB::table('jw_inserts.insert_stones')->truncate();
        DB::table('jw_inserts.metrics')->truncate();
        DB::table('jw_inserts.optional_infos')->truncate();
        DB::table('jw_inserts.inserts')->truncate();
        DB::table('jw_inserts.stone_families')->truncate();
        DB::table('jw_inserts.stone_groups')->truncate();
        DB::table('jw_inserts.stone_grades')->truncate();
        DB::table('jw_inserts.natural_stones')->truncate();
        DB::table('jw_inserts.natural_stone_grade')->truncate();
        DB::table('jw_inserts.grown_stones')->truncate();
        DB::table('jw_inserts.imitation_stones')->truncate();
        DB::table('jewelleries.jewelleries')->truncate();
        DB::table('jewelleries.jw_categories')->truncate();
        DB::table('metals.jw_prcs_metal_props')->truncate();
        DB::table('metals.prcs_metal_colours')->truncate();
        DB::table('metals.prcs_metal_hallmarks')->truncate();
        DB::table('metals.prcs_metals')->truncate();
        Schema::enableForeignKeyConstraints();

        $categories = config('data-seed.data_items.jw_categories');
        $weavings = config('data-seed.data_items.jw_weavings');
        $earring_clasps = config('data-seed.data_items.earring_clasps');
        $earring_types = config('data-seed.data_items.earring_types');
        $jw_clasps = config('data-seed.data_items.jw_clasps');
        $ring_sizes = config('data-seed.data_items.ring_sizes');
        $chain_sizes = config('data-seed.data_items.chain_sizes');
        $bracelet_sizes = config('data-seed.data_items.bracelet_sizes');
        $necklace_sizes = config('data-seed.data_items.necklace_sizes');
        $bead_sizes = config('data-seed.data_items.bead_sizes');
        $body_parts = config('data-seed.data_items.body_parts');
        $prcs_metals = config('data-seed.data_items.prcs_metals');
        $metal_hallmarks = config('data-seed.data_items.prcs_metal_hallmarks');
        $metal_colours = config('data-seed.data_items.prcs_metal_colours');
        $jw_coverages = config('data-seed.data_items.jw_coverages');
        $jwCoverageTypes = config('data-seed.data_items.jw_coverage_types');
        $bracelet_bases = config('data-seed.data_items.bracelet_bases');
        $bead_bases = config('data-seed.data_items.bead_bases');
        $length_names = config('data-seed.data_items.length_names');

        $jwInsertsTypeOrigins = config('data-seed.insert-seed.items-seed.origins');
        $jwInsertsStoneColours = config('data-seed.insert-seed.items-seed.stone_colours');
        $jwInsertsStoneFacets = config('data-seed.insert-seed.items-seed.stone_facets');
        $jwInsertsStoneFamilies = config('data-seed.insert-seed.items-seed.family');
        $jwInsertsStoneGroups = config('data-seed.insert-seed.items-seed.groups');
        $jwInsertsStoneGrades = config('data-seed.insert-seed.items-seed.grades');
        $jwInsertsOpticalEffects = config('data-seed.insert-seed.items-seed.optical_effects');
        $jwInsertsNaturalStones = config('data-seed.insert-seed.nature-stones-seed.stones');
        $jwInsertsGrownStones = config('data-seed.insert-seed.grown-stones-seed.stones');
        $jwInsertsImitationStones = config('data-seed.insert-seed.imitation-stones-seed.stones');

//        dd($jwInsertsTypeOrigins);

        foreach ($jwInsertsOpticalEffects as $effect) {
            DB::table('jw_inserts.optical_effects')->insert([
                'name' => $effect['name'],
                'slug' => Str::slug($effect['name'], '-'),
                'description' => $effect['description'],
                'created_at' => now(),
            ]);
        }

        foreach ($jwInsertsStoneGrades as $grade) {
            DB::table('jw_inserts.stone_grades')->insert([
                'name' => $grade['name'],
                'slug' => Str::slug($grade['name'], '-'),
                'description' => $grade['description'],
                'created_at' => now(),
            ]);
        }

        foreach ($jwInsertsStoneGroups as $group) {
            DB::table('jw_inserts.stone_groups')->insert([
                'name' => $group['name'],
                'slug' => Str::slug($group['name'], '-'),
                'description' => $group['description'],
                'created_at' => now(),
            ]);
        }

        foreach ($jwInsertsStoneFamilies as $family) {
            DB::table('jw_inserts.stone_families')->insert([
                'name' => $family['name'],
                'slug' => Str::slug($family['name'], '-'),
                'description' => $family['description'],
                'created_at' => now(),
            ]);
        }

        foreach ($jwInsertsStoneFacets as $facet) {
            DB::table('jw_inserts.facets')->insert([
                'name' => $facet['name'],
                'slug' => Str::slug($facet['name'], '-'),
                'description' => $facet['description'],
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        foreach ($jwInsertsStoneColours as $colour) {
            DB::table('jw_inserts.colours')->insert([
                'name' => $colour['name'],
                'slug' => Str::slug($colour['name'], '-'),
                'description' => $colour['description'],
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        foreach ($jwInsertsTypeOrigins as $origin) {
            DB::table('jw_inserts.type_origins')->insert([
                'name' => $origin['name'],
                'slug' => Str::slug($origin['name'], '-'),
                'description' => $origin['description'],
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        $typeOriginId = DB::table('jw_inserts.type_origins')->where('name', '=', 'природные')->value('id');
        foreach ($jwInsertsNaturalStones as $stone) {
            $stoneId = DB::table('jw_inserts.stones')->insertGetId([
                'type_origin_id' => $typeOriginId,
                'name' => $stone['name'],
                'alt_name' => $stone['alt_name'],
                'slug' => Str::slug($stone['name'], '-'),
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
            dump($stone);
            $naturalStoneId = DB::table('jw_inserts.natural_stones')->insertGetId([
                'stone_id' => $stoneId,
                'stone_group_id' => DB::table('jw_inserts.stone_groups')->where('name', $stone['group'])->value('id'),
                'stone_family_id' => DB::table('jw_inserts.stone_families')->where('name', $stone['family'])->value('id'),
                'created_at' => now(),
            ]);

            if ($stone['grade']) {
                DB::table('jw_inserts.natural_stone_grade')->insert([
                    'natural_stone_id' => $naturalStoneId,
                    'stone_grade_id' => DB::table('jw_inserts.stone_grades')->where('name', $stone['grade'])->value('id'),
                    'created_at' => now(),
                ]);
            }
        }

        $typeGrownId = DB::table('jw_inserts.type_origins')->where('name', '=', 'выращенные')->value('id');
        foreach ($jwInsertsGrownStones as $stone) {
            $stoneId = DB::table('jw_inserts.stones')->insertGetId([
                'type_origin_id' => $typeGrownId,
                'name' => $stone['name'],
                'alt_name' => $stone['alt_name'],
                'slug' => Str::slug($stone['name'], '-'),
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

            DB::table('jw_inserts.grown_stones')->insertGetId([
                'stone_id' => $stoneId,
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
                'slug' => Str::slug($stone['name'], '-'),
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
                'stone_id' => $stoneId,
                'created_at' => now(),
            ]);
        }

        foreach ($categories as $category) {
            DB::table('jewelleries.jw_categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($jwCoverageTypes as $type) {
            DB::table('jw_coverages.coverage_types')->insert([
                'name' => $type,
                'slug' => Str::slug($type, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($jw_coverages as $coverage) {
            DB::table('jw_coverages.coverages')->insert([
                'coverage_type_id' => DB::table('jw_coverages.coverage_types')->where('name', $coverage['type'])->value('id'),
                'name' => $coverage['coverage'],
                'slug' => Str::slug($coverage['coverage'], '-'),
                'is_active' => 1,
                'created_at' => now(),
            ]);
        }

        foreach ($weavings as $weave) {
            DB::table('properties.jw_weavings')->insert([
                'name' => $weave,
                'slug' => Str::slug($weave, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($bracelet_bases as $base) {
            DB::table('properties.bracelet_bases')->insert([
                'name' => $base,
                'slug' => Str::slug($base, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($bead_bases as $base) {
            DB::table('properties.bead_bases')->insert([
                'name' => $base,
                'slug' => Str::slug($base, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($earring_clasps as $clasp) {
            DB::table('properties.earring_clasps')->insert([
                'name' => $clasp['name'],
                'slug' => Str::slug($clasp['name'], '-'),
                'description' => $clasp['description'],
                'created_at' => now(),
            ]);
        }

        foreach ($earring_types as $type) {
            DB::table('properties.earring_types')->insert([
                'name' => $type['name'],
                'slug' => Str::slug($type['name'], '-'),
                'description' => $type['description'],
                'created_at' => now(),
            ]);
        }

        foreach ($jw_clasps as $clasp) {
            DB::table('properties.jw_clasps')->insert([
                'name' => $clasp,
                'slug' => Str::slug($clasp, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($body_parts as $body_part) {
            DB::table('properties.body_parts')->insert([
                'name' => $body_part,
                'slug' => Str::slug($body_part, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($prcs_metals as $metal) {
            DB::table('metals.prcs_metals')->insert([
                'name' => $metal,
                'slug' => Str::slug($metal, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($metal_hallmarks as $hallmark) {
            DB::table('metals.prcs_metal_hallmarks')->insert([
                'value' => $hallmark,
                'created_at' => now(),
            ]);
        }

        foreach ($metal_colours as $colour) {
            DB::table('metals.prcs_metal_colours')->insert([
                'name' => $colour,
                'slug' => Str::slug($colour, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($ring_sizes as $ring_size) {
            DB::table('properties.ring_sizes')->insert([
                'value' => $ring_size['value'],
                'created_at' => now(),
            ]);
        }

        foreach ($length_names as $length_name) {
            DB::table('properties.length_names')->insert([
                'name' => $length_name['name'],
                'slug' => Str::slug($length_name['name'], '-'),
                'description' => Str::slug($length_name['description'], '-'),
            ]);
        }

        foreach ($chain_sizes as $chain_size) {
            DB::table('properties.chain_sizes')->insert([
                'length_name_id' => $this->lengthNameId($chain_size['value']),
                'value' => $chain_size['value'],
                'created_at' => now(),
            ]);
        }

        foreach ($bracelet_sizes as $bracelet_size) {
            DB::table('properties.bracelet_sizes')->insert([
                'value' => $bracelet_size['value'],
                'created_at' => now(),
            ]);
        }

        foreach ($necklace_sizes as $necklace_size) {
            DB::table('properties.necklace_sizes')->insert([
                'length_name_id' => $this->lengthNameId($necklace_size['value']),
                'value' => $necklace_size['value'],
                'created_at' => now(),
            ]);
        }

        foreach ($bead_sizes as $size) {
            DB::table('properties.bead_sizes')->insert([
                'length_name_id' => $this->lengthNameId($size['value']),
                'value' => $size['value'],
                'created_at' => now(),
            ]);
        }
    }

    private function lengthNameId($size): int
    {
        if ($size <= 35) {
            return DB::table('properties.length_names')->where('name', 'коллар')->value('id');
        }
        if ($size <= 45) {
            return DB::table('properties.length_names')->where('name', 'чокер')->value('id');
        }
        if ($size <= 55) {
            return DB::table('properties.length_names')->where('name', 'принцесса')->value('id');
        }
        if ($size <= 65) {
            return DB::table('properties.length_names')->where('name', 'матине')->value('id');
        }
        if ($size <= 85) {
            return DB::table('properties.length_names')->where('name', 'опера')->value('id');
        }

        return DB::table('properties.length_names')->where('name', 'роп')->value('id');
    }
}
