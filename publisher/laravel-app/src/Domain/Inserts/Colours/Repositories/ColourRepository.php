<?php

declare(strict_types=1);

namespace Domain\Inserts\Colours\Repositories;

use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\Colours\Enums\ColourRelationshipsEnum;
use Domain\Inserts\Colours\Models\Colour;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ColourRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Colour::class)
            ->allowedIncludes([
                ColourRelationshipsEnum::INSERT_EXTERIORS->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(ColourEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Colour
    {
        return Colour::create($data);
    }

    public function show(array $data, int $id): Colour
    {
        return QueryBuilder::for(Colour::class)
            ->where(ColourEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ColourRelationshipsEnum::INSERT_EXTERIORS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Colour::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Colour::findOrFail($id)->delete();
    }
}