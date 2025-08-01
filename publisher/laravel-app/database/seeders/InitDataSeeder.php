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
        DB::table('properties.jw_necklace_metrics')->truncate();
        DB::table('properties.jw_necklace_props')->truncate();
        DB::table('properties.necklace_sizes')->truncate();
        DB::table('properties.jw_chain_weavings')->truncate();
        DB::table('properties.jw_chain_metrics')->truncate();
        DB::table('properties.jw_chain_props')->truncate();
        DB::table('properties.chain_sizes')->truncate();
        DB::table('properties.jw_bracelet_weavings')->truncate();
        DB::table('properties.jw_bracelet_metrics')->truncate();
        DB::table('properties.bracelet_sizes')->truncate();
        DB::table('properties.jw_weavings')->truncate();
        DB::table('properties.jw_bracelet_props')->truncate();
        DB::table('properties.body_parts')->truncate();
        DB::table('properties.jw_clasps')->truncate();
        DB::table('properties.jw_ring_metrics')->truncate();
        DB::table('properties.jw_ring_props')->truncate();
        DB::table('properties.ring_sizes')->truncate();
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
        DB::table('coverages.jewellery_jw_coverage')->truncate();
        DB::table('coverages.jw_coverages')->truncate();
        DB::table('medias.jw_set_pictures')->truncate();
        DB::table('medias.jw_pictures')->truncate();
        DB::table('medias.jw_set_video_types')->truncate();
        DB::table('medias.jw_set_videos')->truncate();
        DB::table('medias.jw_videos')->truncate();
        DB::table('medias.video_types')->truncate();
        DB::table('medias.jw_medias')->truncate();
        DB::table('medias.jw_media_producers')->truncate();
        DB::table('medias.jw_media_categories')->truncate();
        DB::table('inserts.jw_inserts')->truncate();
        DB::table('inserts.jw_insert_metrics')->truncate();
        DB::table('inserts.insert_visual_details')->truncate();
        DB::table('inserts.stone_shapes')->truncate();
        DB::table('inserts.stone_colours')->truncate();
        DB::table('inserts.stones')->truncate();
        DB::table('inserts.diamond_details')->truncate();
        DB::table('inserts.stone_types')->truncate();
        DB::table('jewelleries.jewelleries')->truncate();
        DB::table('jewelleries.jw_categories')->truncate();
        DB::table('metals.jw_prcs_metal_props')->truncate();
        DB::table('metals.prcs_metal_colours')->truncate();
        DB::table('metals.prcs_metal_hallmarks')->truncate();
        DB::table('metals.prcs_metals')->truncate();
        Schema::enableForeignKeyConstraints();

        $categories = config('data-seed.data_items.jw_categories');
        $weaves = config('data-seed.data_items.jw_weavings');
        $earring_clasps = config('data-seed.data_items.earring_clasps');
        $jw_clasps = config('data-seed.data_items.jw_clasps');
        $ring_sizes = config('data-seed.data_items.ring_sizes');
        $chain_sizes = config('data-seed.data_items.chain_sizes');
        $bracelet_sizes = config('data-seed.data_items.bracelet_sizes');
        $necklace_sizes = config('data-seed.data_items.necklace_sizes');
        $body_parts = config('data-seed.data_items.body_parts');
        $prcs_metals = config('data-seed.data_items.prcs_metals');
        $metal_hallmarks = config('data-seed.data_items.prcs_metal_hallmarks');
        $metal_colours = config('data-seed.data_items.prcs_metal_colours');
        $jw_coverages = config('data-seed.data_items.jw_coverages');

//        dd($categories);
        foreach ($categories as $category) {
            DB::table('jewelleries.jw_categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category, '-'),
                'created_at' => now(),
            ]);
        }

        foreach ($weaves as $weave) {
            DB::table('properties.jw_weavings')->insert([
                'name' => $weave,
                'slug' => Str::slug($weave),
                'created_at' => now(),
            ]);
        }

        foreach ($earring_clasps as $clasp) {
            DB::table('properties.earring_clasps')->insert([
                'name' => $clasp,
                'slug' => Str::slug($clasp),
                'created_at' => now(),
            ]);
        }

        foreach ($jw_clasps as $clasp) {
            DB::table('properties.jw_clasps')->insert([
                'name' => $clasp,
                'slug' => Str::slug($clasp),
                'created_at' => now(),
            ]);
        }

        foreach ($body_parts as $body_part) {
            DB::table('properties.body_parts')->insert([
                'name' => $body_part,
                'slug' => Str::slug($body_part),
                'created_at' => now(),
            ]);
        }

        foreach ($prcs_metals as $metal) {
            DB::table('metals.prcs_metals')->insert([
                'name' => $metal,
                'slug' => Str::slug($metal),
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
                'slug' => Str::slug($colour),
                'created_at' => now(),
            ]);
        }

        foreach ($ring_sizes as $ring_size) {
            DB::table('properties.ring_sizes')->insert([
                'value' => $ring_size['value'],
                'created_at' => now(),
            ]);
        }

        foreach ($chain_sizes as $chain_size) {
            DB::table('properties.chain_sizes')->insert([
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
                'value' => $necklace_size['value'],
                'created_at' => now(),
            ]);
        }
    }
}
