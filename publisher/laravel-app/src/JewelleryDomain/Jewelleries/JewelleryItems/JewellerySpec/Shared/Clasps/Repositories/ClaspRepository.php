<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ClaspRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Clasp::class)
            ->allowedIncludes([
                ClaspRelationshipsEnum::BEADS->value,
                ClaspRelationshipsEnum::BRACELETS->value,
                ClaspRelationshipsEnum::CHAINS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(ClaspEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Clasp
    {
        return Clasp::create($data);
    }

    public function show(array $data, int $id): Clasp
    {
        return QueryBuilder::for(Clasp::class)
            ->where(ClaspEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ClaspRelationshipsEnum::BEADS->value,
                ClaspRelationshipsEnum::BRACELETS->value,
                ClaspRelationshipsEnum::CHAINS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Clasp::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Clasp::findOrFail($id)->delete();
    }
}
