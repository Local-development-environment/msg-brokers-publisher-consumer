<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Facets\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetEnum;
use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\Facets\Models\Facet;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class FacetRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Facet::class)
            ->allowedIncludes([
                FacetRelationshipsEnum::STONE_EXTERIORS->value
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
                FacetRelationshipsEnum::STONE_EXTERIORS->value
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
