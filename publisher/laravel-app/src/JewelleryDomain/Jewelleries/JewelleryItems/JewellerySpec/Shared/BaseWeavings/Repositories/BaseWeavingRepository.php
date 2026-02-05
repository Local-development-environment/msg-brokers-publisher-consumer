<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Enums\BaseWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Enums\BaseWeavingRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Models\BaseWeaving;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BaseWeavingRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BaseWeaving::class)
            ->allowedIncludes([
                BaseWeavingRelationshipsEnum::WEAVINGS->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(BaseWeavingEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BaseWeaving
    {
        return BaseWeaving::create($data);
    }

    public function show(array $data, int $id): BaseWeaving
    {
        return QueryBuilder::for(BaseWeaving::class)
            ->where(BaseWeavingEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BaseWeavingRelationshipsEnum::WEAVINGS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BaseWeaving::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BaseWeaving::findOrFail($id)->delete();
    }
}
