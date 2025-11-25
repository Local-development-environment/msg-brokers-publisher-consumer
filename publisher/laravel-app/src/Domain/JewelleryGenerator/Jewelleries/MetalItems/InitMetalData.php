<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\MetalItems;

use Domain\PreciousMetals\Coverages\Enums\CoverageBuilderEnum;
use Domain\PreciousMetals\Coverages\Enums\CoverageEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkEnum;
use Domain\PreciousMetals\MetalExteriors\Enums\MetalExteriorEnum;
use Domain\PreciousMetals\MetalHallmarks\Enums\MetalHallmarkEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeBuilderEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitMetalData
{
    public function __invoke(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(CoverageEnum::TABLE_NAME->value)->truncate();
        DB::table(MetalTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(HallmarkEnum::TABLE_NAME->value)->truncate();
        DB::table(MetalHallmarkEnum::TABLE_NAME->value)->truncate();
        DB::table(MetalExteriorEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (CoverageBuilderEnum::cases() as $case) {
            DB::table(CoverageEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        foreach (MetalTypeBuilderEnum::cases() as $case) {
            DB::table(MetalTypeEnum::TABLE_NAME->value)->insert([
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

        foreach (HallmarkBuilderEnum::cases() as $case) {

            $hallmarkId = DB::table(HallmarkEnum::TABLE_NAME->value)
                ->where('value', $case->value)
                ->value('id');

            $metals = $case->metals();

            foreach ($metals as $metal) {

                $metalTypeId = DB::table(MetalTypeEnum::TABLE_NAME->value)
                    ->where('name', $metal)
                    ->value('id');

                DB::table(MetalHallmarkEnum::TABLE_NAME->value)
                    ->insert([
                        'metal_type_id' => $metalTypeId,
                        'hallmark_id' => $hallmarkId,
                        'created_at' => now(),
                    ]);
            }
        }
    }
}