<?php

declare(strict_types=1);

namespace Domain\Inserts\OptionalInfos\Repositories;

use Domain\Inserts\OptionalInfos\Enums\OptionalInfoEnum;
use Domain\Inserts\OptionalInfos\Enums\OptionalInfoRelationshipsEnum;
use Domain\Inserts\OptionalInfos\Models\OptionalInfo;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class OptionalInfoRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(OptionalInfo::class)
            ->allowedIncludes([OptionalInfoRelationshipsEnum::INSERT->value])
            ->allowedFilters([
                AllowedFilter::exact(OptionalInfoEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): OptionalInfo
    {
        return OptionalInfo::create($data);
    }

    public function show(array $data, int $id): OptionalInfo
    {
        return QueryBuilder::for(OptionalInfo::class)
            ->where('id', $id)
            ->allowedIncludes([OptionalInfoRelationshipsEnum::INSERT->value])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        OptionalInfo::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        OptionalInfo::findOrFail($id)->delete();
    }
}