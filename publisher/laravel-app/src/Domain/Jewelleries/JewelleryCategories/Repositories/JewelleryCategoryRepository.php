<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryCategories\Repositories;

use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryRelationshipsEnum;
use Domain\Jewelleries\JewelleryCategories\Models\JewelleryCategory;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class JewelleryCategoryRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(JewelleryCategory::class)
            ->allowedIncludes([
                JewelleryCategoryRelationshipsEnum::JEWELLERIES->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(JewelleryCategoryEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): JewelleryCategory
    {
        return JewelleryCategory::create($data);
    }

    public function show(array $data, int $id): JewelleryCategory
    {
        return QueryBuilder::for(JewelleryCategory::class)
            ->where(JewelleryCategoryEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                JewelleryCategoryRelationshipsEnum::JEWELLERIES->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        JewelleryCategory::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        JewelleryCategory::findOrFail($id)->delete();
    }
}
