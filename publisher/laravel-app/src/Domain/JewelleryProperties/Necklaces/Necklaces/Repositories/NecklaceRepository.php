<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Repositories;

use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceRelationshipsEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class NecklaceRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Necklace::class)
            ->allowedIncludes([
                NecklaceRelationshipsEnum::NECK_SIZES->value,
                NecklaceRelationshipsEnum::NECKLACE_METRICS->value,
                NecklaceRelationshipsEnum::JEWELLERY->value,
                NecklaceRelationshipsEnum::CLASP->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(NecklaceEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Necklace
    {
        return Necklace::create($data);
    }

    public function show(array $data, int $id): Necklace
    {
        return QueryBuilder::for(Necklace::class)
            ->where(NecklaceEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                NecklaceRelationshipsEnum::NECK_SIZES->value,
                NecklaceRelationshipsEnum::NECKLACE_METRICS->value,
                NecklaceRelationshipsEnum::JEWELLERY->value,
                NecklaceRelationshipsEnum::CLASP->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Necklace::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Necklace::findOrFail($id)->delete();
    }
}