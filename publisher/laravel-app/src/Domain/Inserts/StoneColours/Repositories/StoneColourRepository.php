<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneColours\Repositories;

use Domain\Inserts\StoneColours\Enums\StoneColourEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourRelationshipsEnum;
use Domain\Inserts\StoneColours\Models\StoneColour;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneColourRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneColour::class)
            ->allowedIncludes([
                StoneColourRelationshipsEnum::STONE_EXTERIORS->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(StoneColourEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneColour
    {
        return StoneColour::create($data);
    }

    public function show(array $data, int $id): StoneColour
    {
        return QueryBuilder::for(StoneColour::class)
            ->where(StoneColourEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                StoneColourRelationshipsEnum::STONE_EXTERIORS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneColour::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneColour::findOrFail($id)->delete();
    }
}
