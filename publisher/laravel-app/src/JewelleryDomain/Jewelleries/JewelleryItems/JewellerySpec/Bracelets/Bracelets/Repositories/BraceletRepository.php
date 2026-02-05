<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Enums\BraceletEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Enums\BraceletRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BraceletRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Bracelet::class)
            ->allowedIncludes([
                BraceletRelationshipsEnum::BRACELET_WEAVINGS->value,
                BraceletRelationshipsEnum::BRACELET_METRICS->value,
                BraceletRelationshipsEnum::BRACELET_BASE->value,
                BraceletRelationshipsEnum::BODY_PART->value,
                BraceletRelationshipsEnum::JEWELLERY->value,
                BraceletRelationshipsEnum::CLASP->value,
                BraceletRelationshipsEnum::BRACELET_SIZES->value,
                BraceletRelationshipsEnum::WEAVINGS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BraceletEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Bracelet
    {
        return Bracelet::create($data);
    }

    public function show(array $data, int $id): Bracelet
    {
        return QueryBuilder::for(Bracelet::class)
            ->where(BraceletEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BraceletRelationshipsEnum::BRACELET_WEAVINGS->value,
                BraceletRelationshipsEnum::BRACELET_METRICS->value,
                BraceletRelationshipsEnum::BRACELET_BASE->value,
                BraceletRelationshipsEnum::BODY_PART->value,
                BraceletRelationshipsEnum::JEWELLERY->value,
                BraceletRelationshipsEnum::CLASP->value,
                BraceletRelationshipsEnum::BRACELET_SIZES->value,
                BraceletRelationshipsEnum::WEAVINGS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Bracelet::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Bracelet::findOrFail($id)->delete();
    }
}
