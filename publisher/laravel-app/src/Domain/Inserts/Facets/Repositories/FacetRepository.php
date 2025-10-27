<?php

declare(strict_types=1);

namespace Domain\Inserts\Facets\Repositories;

use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\Facets\Enums\FacetRelationshipsEnum;
use Domain\Inserts\Facets\Models\Facet;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class FacetRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Facet::class)
            ->allowedIncludes([
                FacetRelationshipsEnum::INSERT_EXTERIORS->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(FacetEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Facet
    {
        return Facet::create($data);
    }

    public function show(array $data, int $id): Facet
    {
        return QueryBuilder::for(Facet::class)
            ->where(FacetEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                FacetRelationshipsEnum::INSERT_EXTERIORS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Facet::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Facet::findOrFail($id)->delete();
    }
}