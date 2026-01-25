<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeBuilderEnum;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeEnum;
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

        DB::table('jw_promotions.jewellery_promotion')->truncate();
        DB::table('jw_promotions.promotions')->truncate();
        DB::table('jw_medias.video_types')->truncate();
        DB::table(JewelleryEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

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
