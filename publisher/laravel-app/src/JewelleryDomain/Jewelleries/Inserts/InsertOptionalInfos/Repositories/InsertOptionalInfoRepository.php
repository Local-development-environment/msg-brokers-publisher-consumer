<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertOptionalInfoRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(InsertOptionalInfo::class)
            ->allowedIncludes([InsertOptionalInfoRelationshipsEnum::INSERT->value])
            ->allowedFilters([
                AllowedFilter::exact(InsertOptionalInfoEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): InsertOptionalInfo
    {
        return InsertOptionalInfo::create($data);
    }

    public function show(array $data, int $id): InsertOptionalInfo
    {
        return QueryBuilder::for(InsertOptionalInfo::class)
            ->where(InsertOptionalInfoEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([InsertOptionalInfoRelationshipsEnum::INSERT->value])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        InsertOptionalInfo::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        InsertOptionalInfo::findOrFail($id)->delete();
    }
}
