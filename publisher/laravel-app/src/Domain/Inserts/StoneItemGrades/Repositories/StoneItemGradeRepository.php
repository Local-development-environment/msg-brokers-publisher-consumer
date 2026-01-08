<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneItemGrades\Repositories;

use Domain\Inserts\StoneItemGrades\Enums\StoneItemGradeEnum;
use Domain\Inserts\StoneItemGrades\Enums\StoneItemGradeRelationshipsEnum;
use Domain\Inserts\StoneItemGrades\Models\StoneItemGrade;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneItemGradeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneItemGrade::class)
            ->allowedIncludes([
                StoneItemGradeRelationshipsEnum::GROUP_GRADE->value,
                StoneItemGradeRelationshipsEnum::STONE_GRADE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(StoneItemGradeEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneItemGrade
    {
        return StoneItemGrade::create($data);
    }

    public function show(array $data, int $id): StoneItemGrade
    {
        return QueryBuilder::for(StoneItemGrade::class)
            ->where(StoneItemGradeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                StoneItemGradeRelationshipsEnum::GROUP_GRADE->value,
                StoneItemGradeRelationshipsEnum::STONE_GRADE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneItemGrade::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneItemGrade::findOrFail($id)->delete();
    }
}
