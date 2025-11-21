<?php

declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Repositories;

use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeRelationshipsEnum;
use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class GroupGradeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(GroupGrade::class)
            ->allowedIncludes([
                GroupGradeRelationshipsEnum::STONE_GRADE->value,
                GroupGradeRelationshipsEnum::NATURAL_STONE->value,
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
                GroupGradeRelationshipsEnum::STONE_GRADE->value,
                GroupGradeRelationshipsEnum::NATURAL_STONE->value,
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