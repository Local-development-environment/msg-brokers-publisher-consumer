<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories;

use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\Inserts\Enums\InsertRelationshipsEnum;
use Domain\Inserts\Inserts\Models\Insert;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Insert::class)
            ->allowedIncludes([
                InsertRelationshipsEnum::INSERT_STONE->value,
                InsertRelationshipsEnum::JEWELLERY->value,
                InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value,
                InsertRelationshipsEnum::METRIC->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(InsertEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Insert
    {
        return Insert::create($data);
    }

    public function show(array $data, int $id): Insert
    {
        return QueryBuilder::for(Insert::class)
            ->where(InsertEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                InsertRelationshipsEnum::INSERT_STONE->value,
                InsertRelationshipsEnum::JEWELLERY->value,
                InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value,
                InsertRelationshipsEnum::METRIC->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Insert::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Insert::findOrFail($id)->delete();
    }
}