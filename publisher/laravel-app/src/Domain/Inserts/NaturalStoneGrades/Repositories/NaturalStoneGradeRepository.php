<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStoneGrades\Repositories;

use Domain\Inserts\NaturalStoneGrades\Enums\NaturalStoneGradeEnum;
use Domain\Inserts\NaturalStoneGrades\Enums\NaturalStoneGradeRelationshipsEnum;
use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class NaturalStoneGradeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(NaturalStoneGrade::class)
            ->allowedIncludes([
                NaturalStoneGradeRelationshipsEnum::STONE_GRADE->value,
                NaturalStoneGradeRelationshipsEnum::NATURAL_STONE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(NaturalStoneGradeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): NaturalStoneGrade
    {
        return NaturalStoneGrade::create($data);
    }

    public function show(array $data, int $id): NaturalStoneGrade
    {
        return QueryBuilder::for(NaturalStoneGrade::class)
            ->where('id', $id)
            ->allowedIncludes([
                NaturalStoneGradeRelationshipsEnum::STONE_GRADE->value,
                NaturalStoneGradeRelationshipsEnum::NATURAL_STONE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        NaturalStoneGrade::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        NaturalStoneGrade::findOrFail($id)->delete();
    }
}