<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GroupGrades\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Enums\GroupGradeEnum;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Enums\GroupGradeRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class GroupGradeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(GroupGrade::class)
            ->allowedIncludes([
                GroupGradeRelationshipsEnum::STONE_ITEM_GRADE->value,
                GroupGradeRelationshipsEnum::NATURAL_STONE->value,
                GroupGradeRelationshipsEnum::STONE_GROUP->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(GroupGradeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): GroupGrade
    {
        return GroupGrade::create($data);
    }

    public function show(array $data, int $id): GroupGrade
    {
        return QueryBuilder::for(GroupGrade::class)
            ->where(GroupGradeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                GroupGradeRelationshipsEnum::STONE_ITEM_GRADE->value,
                GroupGradeRelationshipsEnum::NATURAL_STONE->value,
                GroupGradeRelationshipsEnum::STONE_GROUP->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        GroupGrade::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        GroupGrade::findOrFail($id)->delete();
    }
}
