<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Enums\BraceletTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Enums\BraceletTypeRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Models\BraceletType;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BraceletTypeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BraceletType::class)
            ->allowedIncludes([
                BraceletTypeRelationshipsEnum::BRACELETS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BraceletTypeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BraceletType
    {
        return BraceletType::create($data);
    }

    public function show(array $data, int $id): BraceletType
    {
        return QueryBuilder::for(BraceletType::class)
            ->where(BraceletTypeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BraceletTypeRelationshipsEnum::BRACELETS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BraceletType::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BraceletType::findOrFail($id)->delete();
    }
}
