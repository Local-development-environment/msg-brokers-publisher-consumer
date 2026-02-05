<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Enums\StoneFamilyEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Enums\StoneFamilyRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneFamilyRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneFamily::class)
            ->allowedFields([
                'id', 'name'
            ])
            ->allowedIncludes([
                StoneFamilyRelationshipsEnum::GROWN_STONES->value,
                StoneFamilyRelationshipsEnum::NATURAL_STONES->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(StoneFamilyEnum::PRIMARY_KEY->value),
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
            ->where(StoneFamilyEnum::PRIMARY_KEY->value, $id)
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
