<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGrades\Repositories;

use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeRelationshipsEnum;
use Domain\Inserts\StoneGrades\Models\StoneGrade;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneGradeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneGrade::class)
            ->allowedIncludes([StoneGradeRelationshipsEnum::STONE_ITEM_GRADES->value])
            ->allowedFilters([
                AllowedFilter::exact(StoneGradeEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneGrade
    {
        return StoneGrade::create($data);
    }

    public function show(array $data, int $id): StoneGrade
    {
        return QueryBuilder::for(StoneGrade::class)
            ->where(StoneGradeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([StoneGradeRelationshipsEnum::STONE_ITEM_GRADES->value])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneGrade::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneGrade::findOrFail($id)->delete();
    }
}
