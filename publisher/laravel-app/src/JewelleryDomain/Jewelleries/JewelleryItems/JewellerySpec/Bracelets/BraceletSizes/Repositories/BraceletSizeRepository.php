<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums\BraceletSizeRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Models\BraceletSize;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BraceletSizeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BraceletSize::class)
            ->allowedIncludes([
                BraceletSizeRelationshipsEnum::BRACELETS->value,
                BraceletSizeRelationshipsEnum::BRACELET_METRICS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BraceletSizeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BraceletSize
    {
        return BraceletSize::create($data);
    }

    public function show(array $data, int $id): BraceletSize
    {
        return QueryBuilder::for(BraceletSize::class)
            ->where(BraceletSizeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BraceletSizeRelationshipsEnum::BRACELETS->value,
                BraceletSizeRelationshipsEnum::BRACELET_METRICS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BraceletSize::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BraceletSize::findOrFail($id)->delete();
    }
}
