<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Medias;

use Domain\Medias\MediaCatalog\JewelleryPictures\Enums\JewelleryPictureEnum;
use Domain\Medias\MediaCatalog\JewelleryVideoDetails\Enums\JewelleryVideoDetailEnum;
use Domain\Medias\MediaCatalog\JewelleryVideos\Enums\JewelleryVideoEnum;
use Domain\Medias\MediaCatalog\MediaCatalog\Enums\MediaCatalogEnum;
use Domain\Medias\MediaReviews\MediaReviews\Enums\MediaReviewEnum;
use Domain\Medias\MediaReviews\ReviewPictures\Enums\ReviewPictureEnum;
use Domain\Medias\MediaReviews\ReviewVideoDetails\Enums\ReviewVideoDetailEnum;
use Domain\Medias\MediaReviews\ReviewVideos\Enums\ReviewVideoEnum;
use Domain\Medias\Shared\MediaTypes\Enums\MediaTypeBuilderEnum;
use Domain\Medias\Shared\MediaTypes\Enums\MediaTypeEnum;
use Domain\Medias\Shared\Producers\Enums\ProducerEnum;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeBuilderEnum;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitMedia
{
    public function __invoke(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(JewelleryPictureEnum::TABLE_NAME->value)->truncate();
        DB::table(JewelleryVideoEnum::TABLE_NAME->value)->truncate();
        DB::table(JewelleryVideoDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(MediaCatalogEnum::TABLE_NAME->value)->truncate();
        DB::table(ReviewPictureEnum::TABLE_NAME->value)->truncate();
        DB::table(ReviewVideoDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(VideoTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(ReviewVideoEnum::TABLE_NAME->value)->truncate();
        DB::table(MediaTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(MediaReviewEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (VideoTypeBuilderEnum::cases() as $case) {
            DB::table(VideoTypeEnum::TABLE_NAME->value)->insert([
                'type' => $case->value,
                'extension' => $case->extension(),
                'created_at' => now(),
            ]);
        }

        foreach (MediaTypeBuilderEnum::cases() as $case) {
            DB::table(MediaTypeEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }
    }
}