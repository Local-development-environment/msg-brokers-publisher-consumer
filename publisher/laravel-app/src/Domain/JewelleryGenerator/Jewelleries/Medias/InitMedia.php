<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Medias;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogPictures\Enums\CatalogPictureEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideoDetails\Enums\CatalogVideoDetailEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Enums\CatalogVideoEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Enums\ReviewMediaEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewPictures\Enums\ReviewPictureEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideoDetails\Enums\ReviewVideoDetailEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Enums\ReviewVideoEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums\MediaTypeBuilderEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums\MediaTypeEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums\VideoTypeBuilderEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums\VideoTypeEnum;

final class InitMedia
{
    public function __invoke(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(CatalogPictureEnum::TABLE_NAME->value)->truncate();
        DB::table(CatalogVideoEnum::TABLE_NAME->value)->truncate();
        DB::table(CatalogVideoDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(CatalogMediaEnum::TABLE_NAME->value)->truncate();
        DB::table(ReviewPictureEnum::TABLE_NAME->value)->truncate();
        DB::table(ReviewVideoDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(VideoTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(ReviewVideoEnum::TABLE_NAME->value)->truncate();
        DB::table(MediaTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(ReviewMediaEnum::TABLE_NAME->value)->truncate();

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
