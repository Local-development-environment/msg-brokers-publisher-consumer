<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use Domain\Inserts\NaturalStones\Enums\NatureStoneEnum;
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

        $jewellery = config('data-seed.insert-seed.stones.jewellery-stones');
        $precious = config('data-seed.insert-seed.stones.precious-stones');
        $jewelleryOrnamental = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');
        $ornamental = config('data-seed.insert-seed.stones.ornamental-stones');

        $natureStone = array_merge_recursive($jewellery, $precious, $jewelleryOrnamental, $ornamental);

        $grownStone = config('data-seed.insert-seed.stones.grown-stones');

        $imitationStone = config('data-seed.insert-seed.stones.imitation-stones');

        foreach (ColourBuilderEnum::cases() as $case) {
            DB::table(ColourEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        foreach (FacetBuilderEnum::cases() as $case) {
            DB::table(FacetEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'is_active' => true,
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
            DB::table(OpticalEffectEnum::TABLE_NAME->value)
                ->insert([
                    'name' => $case->value,
                    'slug' => Str::slug($case->value),
                    'description' => $case->description(),
                    'created_at' => now(),
                ]);
        }

        foreach (StoneFamilyBuilderEnum::cases() as $case) {
            DB::table(StoneFamilyEnum::TABLE_NAME->value)
                ->insert([
                    'name' => $case->value,
                    'slug' => Str::slug($case->value),
                    'description' => $case->description(),
                    'created_at' => now(),
                ]);
        }

        foreach ($grownStone as $stone) {

            $typeOriginId = DB::table(TypeOriginEnum::TABLE_NAME->value)->where(
                'name', TypeOriginBuilderEnum::GROWN->value
            )->value('id');

            $stoneFamilyId = DB::table(StoneFamilyEnum::TABLE_NAME->value)
                ->where('name', $stone['stoneFamily'])
                ->value('id');

            $stoneId = $this->insertStone($stone, $typeOriginId);
            $this->getStoneExterior($stone, $stoneId);

            DB::table(GrownStoneEnum::TABLE_NAME->value)
                ->insert([
                    'id' => $stoneId,
                    'stone_family_id' => $stoneFamilyId,
                    'created_at' => now(),
                ]);
        }

        foreach ($imitationStone as $stone) {

            $typeOriginId = DB::table(TypeOriginEnum::TABLE_NAME->value)->where(
                'name', TypeOriginBuilderEnum::IMITATION->value
            )->value('id');

            $stoneId = $this->insertStone($stone, $typeOriginId);
            $this->getStoneExterior($stone, $stoneId);

            DB::table(ImitationStoneEnum::TABLE_NAME->value)
                ->insert([
                    'id' => $stoneId,
                    'description' => '',
                    'created_at' => now(),
                ]);
        }

        foreach ($natureStone as $stone) {

            $typeOriginId = DB::table(TypeOriginEnum::TABLE_NAME->value)
                ->where('name', TypeOriginBuilderEnum::NATURE->value)
                ->value('id');

            $stoneFamilyId = DB::table(StoneFamilyEnum::TABLE_NAME->value)
                ->where('name', $stone['stoneFamily'])
                ->value('id');

            $stoneGroupId = DB::table(StoneGroupEnum::TABLE_NAME->value)
                ->where('name', $stone['stoneGroup'])
                ->value('id');

            $stoneId = $this->insertStone($stone, $typeOriginId);

            DB::table(NatureStoneEnum::TABLE_NAME->value)
                ->insert([
                    'id' => $stoneId,
                    'stone_family_id' => $stoneFamilyId,
                    'created_at' => now(),
                ]);

            DB::table(GroupGradeEnum::TABLE_NAME->value)
                ->insert([
                    'id' => $stoneId,
                    'stone_group_id' => $stoneGroupId,
                    'created_at' => now(),
                ]);

            if ($stone['stoneGrade'] !== '') {

                $stoneGradeId = DB::table(StoneGradeEnum::TABLE_NAME->value)
                    ->where('name', $stone['stoneGrade'])
                    ->value('id');

                DB::table(StoneItemGradeEnum::TABLE_NAME->value)
                    ->insert([
                        'id' => $stoneId,
                        'stone_grade_id' => $stoneGradeId,
                        'created_at' => now(),
                    ]);
            }

            $this->getStoneExterior($stone, $stoneId);
        }
    }

    private function insertStone(array $stones, int $typeOriginId): int
    {
        return DB::table(StoneEnum::TABLE_NAME->value)
            ->insertGetId([
                'type_origin_id' => $typeOriginId,
                'name' => $stones['stoneName'],
                'slug' => Str::slug($stones['stoneName']),
                'description' => $stones['stoneDescription'],
                'alt_name' => $stones['altStoneName'],
                'is_active' => true,
                'created_at' => now(),
            ]);
    }

    private function getStoneExterior(array $stones, int $stoneId): void
    {
        foreach ($stones['colours'] as $colour) {

            $colourId = DB::table(ColourEnum::TABLE_NAME->value)
                ->where('name', $colour)
                ->value('id');

            foreach ($stones['facets'] as $facet) {

                $facetId = DB::table(FacetEnum::TABLE_NAME->value)
                    ->where('name', $facet[0])
                    ->value('id');

                DB::table(StoneExteriorEnum::TABLE_NAME->value)
                    ->insert([
                        'colour_id' => $colourId,
                        'facet_id' => $facetId,
                        'stone_id' => $stoneId,
                        'created_at' => now(),
                    ]);
            }
        }

        if ($stones['opticalEffect'] !== '') {

            $opticalEffectId = DB::table(OpticalEffectEnum::TABLE_NAME->value)
                ->where('name', $stones['opticalEffect'])
                ->value('id');

            DB::table(StoneOpticalEffectEnum::TABLE_NAME->value)
                ->insert([
                    'id' => $stoneId,
                    'optical_effect_id' => $opticalEffectId,
                    'created_at' => now(),
                ]);
        }
    }
}