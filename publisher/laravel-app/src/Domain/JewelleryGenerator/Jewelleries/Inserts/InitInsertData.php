<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Inserts;

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\NaturalStones\Enums\NaturalStoneEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectEnum;
use Domain\Inserts\StoneExteriours\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupEnum;
use Domain\Inserts\StoneItemGrades\Enums\StoneItemGradeEnum;
use Domain\Inserts\StoneOpticalEffects\Enums\StoneOpticalEffectEnum;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitInsertData
{
    public function __invoke(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table(FacetEnum::TABLE_NAME->value)->truncate();
        DB::table(ColourEnum::TABLE_NAME->value)->truncate();
        DB::table(TypeOriginEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneGroupEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneGradeEnum::TABLE_NAME->value)->truncate();
        DB::table(GroupGradeEnum::TABLE_NAME->value)->truncate();
        DB::table(OpticalEffectEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneOpticalEffectEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneFamilyEnum::TABLE_NAME->value)->truncate();
        DB::table(StoneItemGradeEnum::TABLE_NAME->value)->truncate();
        Schema::enableForeignKeyConstraints();

        $naturalStone = config('data-seed.insert-seed.melnikov_classification');

        foreach (ColourBuilderEnum::cases() as $case) {
            DB::table(ColourEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (FacetBuilderEnum::cases() as $case) {
            DB::table(FacetEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (TypeOriginBuilderEnum::cases() as $case) {
            DB::table(TypeOriginEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (StoneGroupBuilderEnum::cases() as $case) {
            DB::table(StoneGroupEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (StoneGradeBuilderEnum::cases() as $case) {
            DB::table(StoneGradeEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (OpticalEffectBuilderEnum::cases() as $case) {
            DB::table(OpticalEffectEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (StoneFamilyBuilderEnum::cases() as $case) {
            DB::table(StoneFamilyEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach ($naturalStone as $stone) {
            $typeOriginId = DB::table(TypeOriginEnum::TABLE_NAME->value)
                ->where('name', TypeOriginBuilderEnum::ORIGIN->value)->value('id');
            $stoneFamilyId = DB::table(StoneFamilyEnum::TABLE_NAME->value)
                ->where('name', $stone['stoneFamily'])->value('id');
            $stoneGroupId = DB::table(StoneGroupEnum::TABLE_NAME->value)
                ->where('name', $stone['stoneGroup'])->value('id');

            $stoneId = DB::table(StoneEnum::TABLE_NAME->value)->insertGetId([
                'type_origin_id' => $typeOriginId,
                'name' => $stone['stoneName'],
                'slug' => Str::slug($stone['stoneName']),
                'description' => $stone['stoneDescription'],
                'alt_name' => $stone['altStoneName'],
                'is_active' => true,
                'created_at' => now(),
            ]);

            if ($stone['opticalEffect'] !== null) {
                $opticalEffectId = DB::table(OpticalEffectEnum::TABLE_NAME->value)
                    ->where('name', $stone['opticalEffect'])->value('id');
                DB::table(StoneOpticalEffectEnum::TABLE_NAME->value)->insert([
                    'id' => $stoneId,
                    'optical_effect_id' => $opticalEffectId,
                    'created_at' => now(),
                ]);
            }

            DB::table(NaturalStoneEnum::TABLE_NAME->value)->insert([
                'id' => $stoneId,
                'stone_family_id' => $stoneFamilyId,
                'created_at' => now(),
            ]);

            DB::table(GroupGradeEnum::TABLE_NAME->value)->insert([
                'id' => $stoneId,
                'stone_group_id' => $stoneGroupId,
                'created_at' => now(),
            ]);

            if ($stone['stoneGrade'] !== null) {
                $stoneGradeId = DB::table(StoneGradeEnum::TABLE_NAME->value)
                    ->where('name', $stone['stoneGrade'])->value('id');
                DB::table(StoneItemGradeEnum::TABLE_NAME->value)->insert([
                    'id' => $stoneId,
                    'stone_grade_id' => $stoneGradeId,
                    'created_at' => now(),
                ]);
            }

            foreach ($stone['colours'] as $colour) {
                $colourId = DB::table(ColourEnum::TABLE_NAME->value)->where('name', $colour)->value('id');
                foreach ($stone['facets'] as $facet) {
                    $facetId = DB::table(FacetEnum::TABLE_NAME->value)->where('name', $facet[0])->value('id');
                    DB::table(StoneExteriorEnum::TABLE_NAME->value)->insert([
                        'colour_id' => $colourId,
                        'facet_id' => $facetId,
                        'stone_id' => $stoneId,
                        'created_at' => now(),
                    ]);
                }
            }
        }
    }
}