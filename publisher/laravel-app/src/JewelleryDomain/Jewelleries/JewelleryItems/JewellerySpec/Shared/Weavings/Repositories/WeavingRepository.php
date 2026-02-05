<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Models\Weaving;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class WeavingRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Weaving::class)
            ->allowedIncludes([
                WeavingRelationshipsEnum::BRACELETS->value,
                WeavingRelationshipsEnum::BRACELET_WEAVINGS->value,
                WeavingRelationshipsEnum::BASE_WEAVING->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(WeavingEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Weaving
    {
        return Weaving::create($data);
    }

    public function show(array $data, int $id): Weaving
    {
        return QueryBuilder::for(Weaving::class)
            ->where(WeavingEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                WeavingRelationshipsEnum::BRACELETS->value,
                WeavingRelationshipsEnum::BRACELET_WEAVINGS->value,
                WeavingRelationshipsEnum::BASE_WEAVING->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Weaving::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Weaving::findOrFail($id)->delete();
    }
}
