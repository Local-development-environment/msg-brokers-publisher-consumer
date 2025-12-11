<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Medias;

use Domain\Medias\MediaPictures\Pictures\Enums\PictureEnum;
use Domain\Medias\MediaVideos\VideoDetails\Enums\VideoDetailEnum;
use Domain\Medias\MediaVideos\Videos\Enums\VideoEnum;
use Domain\Medias\MediaVideos\VideoTypes\Enums\VideoTypeBuilderEnum;
use Domain\Medias\MediaVideos\VideoTypes\Enums\VideoTypeEnum;
use Domain\Medias\Shared\Producers\Enums\ProducerBuilderEnum;
use Domain\Medias\Shared\Producers\Enums\ProducerEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitMedia
{
    public function __invoke(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(PictureEnum::TABLE_NAME->value)->truncate();
        DB::table(ProducerEnum::TABLE_NAME->value)->truncate();
        DB::table(VideoDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(VideoTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(VideoEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (VideoTypeBuilderEnum::cases() as $case) {
            DB::table(VideoTypeEnum::TABLE_NAME->value)->insert([
                'type' => $case->value,
                'extension' => $case->extension(),
                'created_at' => now(),
            ]);
        }

        foreach (ProducerBuilderEnum::cases() as $case) {
            DB::table(ProducerEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }
    }
}