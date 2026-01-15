<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Repositories;

use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryRelationshipsEnum;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class JewelleryRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Jewellery::class)
            ->allowedIncludes([
                JewelleryRelationshipsEnum::JEWELLERY_CATEGORY->value,
                JewelleryRelationshipsEnum::BEAD->value,
                JewelleryRelationshipsEnum::BRACELET->value,
                JewelleryRelationshipsEnum::CHAIN->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(JewelleryEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Jewellery
    {
//        dd($data);
        return Jewellery::create($data);
    }

    public function show(array $data, int $id): Jewellery
    {
        return QueryBuilder::for(Jewellery::class)
            ->where(JewelleryEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                JewelleryRelationshipsEnum::JEWELLERY_CATEGORY->value,
                JewelleryRelationshipsEnum::BEAD->value,
                JewelleryRelationshipsEnum::BRACELET->value,
                JewelleryRelationshipsEnum::CHAIN->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Jewellery::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Jewellery::findOrFail($id)->delete();
    }
}
