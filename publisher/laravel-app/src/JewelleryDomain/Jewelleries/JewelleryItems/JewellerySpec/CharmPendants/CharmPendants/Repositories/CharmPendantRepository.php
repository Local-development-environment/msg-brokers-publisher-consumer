<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Enums\CharmPendantEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Enums\CharmPendantRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Models\CharmPendant;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class CharmPendantRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(CharmPendant::class)
            ->allowedIncludes([
                CharmPendantRelationshipsEnum::JEWELLERY->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(CharmPendantEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): CharmPendant
    {
        return CharmPendant::create($data);
    }

    public function show(array $data, int $id): CharmPendant
    {
        return QueryBuilder::for(CharmPendant::class)
            ->where(CharmPendantEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                CharmPendantRelationshipsEnum::JEWELLERY->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        CharmPendant::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        CharmPendant::findOrFail($id)->delete();
    }
}
