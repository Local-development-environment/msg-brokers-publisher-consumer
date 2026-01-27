<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\MetalItems;

use Domain\PreciousMetals\Coverages\Enums\CoverageBuilderEnum;
use Domain\PreciousMetals\Coverages\Enums\CoverageEnum;
use Domain\PreciousMetals\CoverageTypes\Enums\CoverageTypeBuilderEnum;
use Domain\PreciousMetals\CoverageTypes\Enums\CoverageTypeEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkEnum;
use Domain\PreciousMetals\JewelleryCoverages\Enums\JewelleryCoverageEnum;
use Domain\PreciousMetals\JewelleryMetals\Enums\JewelleryMetalEnum;
use Domain\PreciousMetals\PreciousMetals\Enums\PreciousMetalBuilderEnum;
use Domain\PreciousMetals\PreciousMetals\Enums\PreciousMetalEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitMetalData
{
    public function __invoke(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(CoverageEnum::TABLE_NAME->value)->truncate();
        DB::table(CoverageTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(PreciousMetalEnum::TABLE_NAME->value)->truncate();
        DB::table(HallmarkEnum::TABLE_NAME->value)->truncate();
        DB::table(JewelleryMetalEnum::TABLE_NAME->value)->truncate();
        DB::table(JewelleryCoverageEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

//        dd(CoverageTypeBuilderEnum::DECORATION->coverages());

        foreach (CoverageTypeBuilderEnum::cases() as $case) {
            $coverageTypeId = DB::table(CoverageTypeEnum::TABLE_NAME->value)->insertGetId([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);

            foreach ($case->coverages() as $coverage) {
                DB::table(CoverageEnum::TABLE_NAME->value)->insert([
                    'name' => CoverageBuilderEnum::{$coverage}->value,
                    'coverage_type_id' => $coverageTypeId,
                    'slug' => Str::slug(CoverageBuilderEnum::{$coverage}->value),
                    'description' => CoverageBuilderEnum::{$coverage}->description(),
                    'is_active' => true,
                    'created_at' => now(),
                ]);
            }
        }

        foreach (PreciousMetalBuilderEnum::cases() as $case) {
            DB::table(PreciousMetalEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        foreach (HallmarkBuilderEnum::cases() as $case) {
            DB::table(HallmarkEnum::TABLE_NAME->value)->insert([
                'value' => $case->value,
                'is_active' => true,
                'created_at' => now(),
            ]);
        }
    }
}
