<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

use Domain\Coverings\CoveringFunctions\Enums\CoveringFunctionBuilderEnum;
use Domain\Coverings\CoveringFunctions\Enums\CoveringFunctionEnum;
use Domain\Coverings\Coverings\Enums\CoveringEnum;
use Domain\Coverings\CoveringShades\Enums\CoveringShadeBuilderEnum;
use Domain\Coverings\CoveringShades\Enums\CoveringShadeEnum;
use Domain\Coverings\CoveringTypes\Enums\CoveringTypeBuilderEnum;
use Domain\Coverings\CoveringTypes\Enums\CoveringTypeEnum;
use Domain\Jewelleries\Categories\Enums\CategoryBuildEnum;
use Domain\Jewelleries\Categories\Enums\CategoryEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseBuildEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseBuildEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspBuilderEnum;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeBuilderEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeEnum;
use Domain\PreciousMetals\GoldenColours\Enums\GoldenColourBuilderEnum;
use Domain\PreciousMetals\GoldenColours\Enums\GoldenColourEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkEnum;
use Domain\PreciousMetals\MetalHallmarks\Enums\MetalHallmarkEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeBuilderEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeEnum;
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
    public function initMetalProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(HallmarkEnum::TABLE_NAME->value)->truncate();
        DB::table(MetalTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(GoldenColourEnum::TABLE_NAME->value)->truncate();
        DB::table(MetalHallmarkEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (MetalTypeBuilderEnum::cases() as $case) {
            DB::table(MetalTypeEnum::TABLE_NAME->value)->insertGetId([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (HallmarkBuilderEnum::cases() as $case) {
            DB::table(HallmarkEnum::TABLE_NAME->value)->insert([
                'value' => $case->value,
                'description' => $case->descriptions(),
                'created_at' => now(),
            ]);
        }

        foreach (GoldenColourBuilderEnum::cases() as $case) {
            DB::table(GoldenColourEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->descriptions(),
                'created_at' => now(),
            ]);
        }

        foreach (MetalTypeBuilderEnum::cases() as $case) {
            $arrHallmarks = $case::{$case->name}->hallmarks();
            foreach ($arrHallmarks as $hallmark) {
                DB::table(MetalHallmarkEnum::TABLE_NAME->value)->insert([
                    'metal_type_id' => DB::table(MetalTypeEnum::TABLE_NAME->value)->where('name', $case->value)->value('id'),
                    'hallmark_id' => DB::table(HallmarkEnum::TABLE_NAME->value)->where('value', $hallmark)->value('id'),
                    'created_at' => now(),
                ]);
            }
        }
    }

    public function initCoveringProperties(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table(CoveringEnum::TABLE_NAME->value)->truncate();
        DB::table(CoveringTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(CoveringFunctionEnum::TABLE_NAME->value)->truncate();
        DB::table(CoveringShadeEnum::TABLE_NAME->value)->truncate();
        Schema::enableForeignKeyConstraints();

        foreach (CoveringShadeBuilderEnum::cases() as $case) {
            DB::table(CoveringShadeEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        foreach (CoveringFunctionBuilderEnum::cases() as $function) {
            DB::table(CoveringFunctionEnum::TABLE_NAME->value)->insert([
                'name' => $function->value,
                'slug' => Str::slug($function->value),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        foreach (CoveringTypeBuilderEnum::cases() as $case) {
            $functionName = $case::{$case->name}->functions();
            DB::table(CoveringTypeEnum::TABLE_NAME->value)->insert([
                'covering_function_id' => DB::table(CoveringFunctionEnum::TABLE_NAME->value)->where('name', $functionName)->value('id'),
                'name' => $case->value,
                'description' => $case->description(),
                'slug' => Str::slug($case->value),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }
    }

    public function initCategoryProperties(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table(CategoryEnum::TABLE_NAME->value)->truncate();
        Schema::enableForeignKeyConstraints();

        foreach (CategoryBuildEnum::cases() as $category) {
            DB::table(CategoryEnum::TABLE_NAME->value)->insert([
                'name' => $category->value,
                'slug' => Str::slug($category->value),
                'description' => $category->description(),
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
}