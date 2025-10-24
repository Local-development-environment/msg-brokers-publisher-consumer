<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneFacets\Repositories;

use Domain\Inserts\StoneFacets\Enums\StoneFacetEnum;
use Domain\Inserts\StoneFacets\Enums\StoneFacetRelationshipsEnum;
use Domain\Inserts\StoneFacets\Models\StoneFacet;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneFacetRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneFacet::class)
            ->allowedIncludes([
                StoneFacetRelationshipsEnum::INSERT_STONES->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(StoneFacetEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneFacet
    {
        return StoneFacet::create($data);
    }

    public function show(array $data, int $id): StoneFacet
    {
        return QueryBuilder::for(StoneFacet::class)
            ->where(StoneFacetEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                StoneFacetRelationshipsEnum::INSERT_STONES->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneFacet::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneFacet::findOrFail($id)->delete();
    }
}