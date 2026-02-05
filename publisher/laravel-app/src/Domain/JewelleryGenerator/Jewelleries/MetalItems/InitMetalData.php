<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\MetalItems;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use JewelleryDomain\Jewelleries\PreciousMetals\Coverages\Enums\CoverageBuilderEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\Coverages\Enums\CoverageEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\CoverageTypes\Enums\CoverageTypeBuilderEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\CoverageTypes\Enums\CoverageTypeEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\Hallmarks\Enums\HallmarkEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\JewelleryCoverages\Enums\JewelleryCoverageEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\JewelleryMetals\Enums\JewelleryMetalEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\PreciousMetals\Enums\PreciousMetalBuilderEnum;
use JewelleryDomain\Jewelleries\PreciousMetals\PreciousMetals\Enums\PreciousMetalEnum;

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
