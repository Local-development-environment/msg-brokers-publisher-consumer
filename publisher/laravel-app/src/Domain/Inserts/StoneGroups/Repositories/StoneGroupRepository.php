<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGroups\Repositories;

use Domain\Inserts\StoneGroups\Enums\StoneGroupEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupRelationshipsEnum;
use Domain\Inserts\StoneGroups\Models\StoneGroup;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneGroupRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneGroup::class)
            ->allowedIncludes([StoneGroupRelationshipsEnum::GROUP_GRADES->value])
            ->allowedFilters([
                AllowedFilter::exact(StoneGroupEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneGroup
    {
        return StoneGroup::create($data);
    }

    public function show(array $data, int $id): StoneGroup
    {
        return QueryBuilder::for(StoneGroup::class)
            ->where(StoneGroupEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([StoneGroupRelationshipsEnum::GROUP_GRADES->value])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneGroup::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneGroup::findOrFail($id)->delete();
    }
}
