<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneFamilies\Repositories;

use Domain\Inserts\StoneFamilies\Enums\StoneFamilyRelationshipsEnum;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

final class StoneFamilyRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneFamily::class)
            ->allowedIncludes([
                StoneFamilyRelationshipsEnum::GROWN_STONES->value,
                StoneFamilyRelationshipsEnum::NATURAL_STONES->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact('id')
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneFamily
    {
        return StoneFamily::create($data);
    }

    public function show(array $data, int $id): StoneFamily
    {
        return QueryBuilder::for(StoneFamily::class)
            ->where('id', $id)
            ->allowedIncludes([
                StoneFamilyRelationshipsEnum::GROWN_STONES->value,
                StoneFamilyRelationshipsEnum::NATURAL_STONES->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneFamily::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneFamily::findOrFail($id)->delete();
    }
}