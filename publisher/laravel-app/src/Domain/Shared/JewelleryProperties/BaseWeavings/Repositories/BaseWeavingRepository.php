<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\BaseWeavings\Repositories;

use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingRelationshipsEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Models\BaseWeaving;
use Illuminate\Contracts\Pagination\Paginator;
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
