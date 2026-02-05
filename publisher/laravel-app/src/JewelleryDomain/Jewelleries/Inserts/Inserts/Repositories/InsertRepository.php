<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Enums\InsertEnum;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Enums\InsertRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Insert::class)
            ->allowedIncludes([
                InsertRelationshipsEnum::STONE_EXTERIOR->value,
                InsertRelationshipsEnum::JEWELLERY->value,
                InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value,
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
                InsertRelationshipsEnum::STONE_EXTERIOR->value,
                InsertRelationshipsEnum::JEWELLERY->value,
                InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value,
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
