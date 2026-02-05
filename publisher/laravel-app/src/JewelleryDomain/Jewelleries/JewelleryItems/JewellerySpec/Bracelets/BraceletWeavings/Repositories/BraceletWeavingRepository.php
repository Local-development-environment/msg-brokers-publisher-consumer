<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Enums\BraceletWeavingRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Models\BraceletWeaving;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BraceletWeavingRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BraceletWeaving::class)
            ->allowedIncludes([
                BraceletWeavingRelationshipsEnum::BRACELET->value,
                BraceletWeavingRelationshipsEnum::WEAVING->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BraceletWeavingEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BraceletWeaving
    {
        return BraceletWeaving::create($data);
    }

    public function show(array $data, int $id): BraceletWeaving
    {
        return QueryBuilder::for(BraceletWeaving::class)
            ->where(BraceletWeavingEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BraceletWeavingRelationshipsEnum::BRACELET->value,
                BraceletWeavingRelationshipsEnum::WEAVING->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BraceletWeaving::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BraceletWeaving::findOrFail($id)->delete();
    }
}
