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
use Domain\PreciousMetals\GoldenColours\Enums\GoldenColourBuilderEnum;
use Domain\PreciousMetals\GoldenColours\Enums\GoldenColourEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkEnum;
use Domain\PreciousMetals\MetalHallmarks\Enums\MetalHallmarkEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeBuilderEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeEnum;
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
}