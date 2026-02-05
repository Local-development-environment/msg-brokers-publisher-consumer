<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Enums\PendantEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Enums\PendantRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Models\Pendant;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class PendantRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Pendant::class)
            ->allowedIncludes([
                PendantRelationshipsEnum::JEWELLERY->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(PendantEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Pendant
    {
        return Pendant::create($data);
    }

    public function show(array $data, int $id): Pendant
    {
        return QueryBuilder::for(Pendant::class)
            ->where(PendantEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                PendantRelationshipsEnum::JEWELLERY->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Pendant::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Pendant::findOrFail($id)->delete();
    }
}
