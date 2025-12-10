<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\Jewelleries\Categories\Enums\CategoryEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseBuildEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadEnum;
use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseBuildEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspBuilderEnum;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeBuilderEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeEnum;
use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerBuilderEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\JewelleryProperties\Rings\RingMetrics\Enums\RingMetricEnum;
use Domain\JewelleryProperties\Rings\Rings\Enums\RingEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingBuilderEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspBuilderEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingBuilderEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitProperties
{
    public function initCategoryProperties(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table(CategoryEnum::TABLE_NAME->value)->truncate();
        Schema::enableForeignKeyConstraints();

        foreach (CategoryBuilderEnum::cases() as $case) {
            DB::table(CategoryEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }
    }

    public function initBeadProperties(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table(BeadEnum::TABLE_NAME->value)->truncate();
        DB::table(BeadBaseEnum::TABLE_NAME->value)->truncate();
        DB::table(BeadMetricEnum::TABLE_NAME->value)->truncate();
        Schema::enableForeignKeyConstraints();

        foreach (BeadBaseBuildEnum::cases() as $beadBase) {
            DB::table(BeadBaseEnum::TABLE_NAME->value)->insert([
                'name' => $beadBase->value,
                'slug' => Str::slug($beadBase->value),
                'description' => $beadBase->description(),
                'created_at' => now(),
            ]);
        }
    }

    public function initBraceletProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(BraceletEnum::TABLE_NAME->value)->truncate();
        DB::table(BodyPartEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletSizeEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletMetricEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletWeavingEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletBaseEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (BraceletBaseBuildEnum::cases() as $braceletBase) {
            DB::table(BraceletBaseEnum::TABLE_NAME->value)->insert([
                'name' => $braceletBase->value,
                'slug' => Str::slug($braceletBase->value),
                'description' => $braceletBase->description(),
                'created_at' => now(),
            ]);
        }

        foreach (BraceletSizeBuilderEnum::cases() as $braceletSize) {
            DB::table(BraceletSizeEnum::TABLE_NAME->value)->insert([
                'value' => $braceletSize->value,
                'unit' => $braceletSize->unitMeasurement(),
                'annotation' => $braceletSize->wrist(),
                'created_at' => now(),
            ]);
        }

        foreach (BodyPartBuilderEnum::cases() as $bodyPart) {
            DB::table(BodyPartEnum::TABLE_NAME->value)->insert([
                'name' => $bodyPart->value,
                'slug' => Str::slug($bodyPart->value),
                'created_at' => now(),
            ]);
        }
    }

    public function initShareProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(ClaspEnum::TABLE_NAME->value)->truncate();
        DB::table(BaseWeavingEnum::TABLE_NAME->value)->truncate();
        DB::table(LengthNameEnum::TABLE_NAME->value)->truncate();
        DB::table(NeckSizeEnum::TABLE_NAME->value)->truncate();
        DB::table(WeavingEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (ClaspBuilderEnum::cases() as $braceletBase) {
            DB::table(ClaspEnum::TABLE_NAME->value)->insert([
                'name' => $braceletBase->value,
                'slug' => Str::slug($braceletBase->value),
                'description' => $braceletBase->description(),
                'created_at' => now(),
            ]);
        }

        foreach (BaseWeavingBuilderEnum::cases() as $baseWeaving) {
            DB::table(BaseWeavingEnum::TABLE_NAME->value)->insert([
                'name' => $baseWeaving->value,
                'slug' => Str::slug($baseWeaving->value),
                'description' => $baseWeaving->description(),
                'created_at' => now(),
            ]);
        }

        foreach (WeavingBuilderEnum::cases() as $case) {
            $baseWeaving = $case::{$case->name}->baseWeaving();
            DB::table(WeavingEnum::TABLE_NAME->value)->insert([
                'base_weaving_id' => DB::table(BaseWeavingEnum::TABLE_NAME->value)->where('name', $baseWeaving)->value('id'),
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }
    }

    public function initEarringProperties(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table(EarringClaspEnum::TABLE_NAME->value)->truncate();
        DB::table(EarringTypeEnum::TABLE_NAME->value)->truncate();
        Schema::enableForeignKeyConstraints();

        foreach (EarringClaspBuilderEnum::cases() as $case) {
            DB::table(EarringClaspEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (EarringTypeBuilderEnum::cases() as $case) {
            DB::table(EarringTypeEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }
    }

    public function initRingProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(RingEnum::TABLE_NAME->value)->truncate();
        DB::table(RingFingerEnum::TABLE_NAME->value)->truncate();
        DB::table(RingMetricEnum::TABLE_NAME->value)->truncate();
        DB::table(RingDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(RingSizeEnum::TABLE_NAME->value)->truncate();
        DB::table(RingTypeEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (RingFingerBuilderEnum::cases() as $case) {
            DB::table(RingFingerEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'created_at' => now(),
            ]);
        }

        foreach (RingTypeBuilderEnum::cases() as $case) {
            DB::table(RingTypeEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (RingSizeBuilderEnum::cases() as $case) {
            DB::table(RingSizeEnum::TABLE_NAME->value)->insert([
                'value' => $case->value,
                'unit' => $case->unitMeasurement(),
                'created_at' => now(),
            ]);
        }
    }
}