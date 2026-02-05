<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums\NatureStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums\NatureStoneRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class NaturalStoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(NaturalStone::class)
            ->allowedIncludes([
                NatureStoneRelationshipsEnum::STONE->value,
                NatureStoneRelationshipsEnum::STONE_FAMILY->value,
                NatureStoneRelationshipsEnum::STONE_GROUP->value,
                NatureStoneRelationshipsEnum::NATURAL_STONE_GRADE->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(NatureStoneEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): NaturalStone
    {
        return NaturalStone::create($data);
    }

    public function show(array $data, int $id): NaturalStone
    {
        return QueryBuilder::for(NaturalStone::class)
            ->where(NatureStoneEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                NatureStoneRelationshipsEnum::STONE->value,
                NatureStoneRelationshipsEnum::STONE_FAMILY->value,
                NatureStoneRelationshipsEnum::STONE_GROUP->value,
                NatureStoneRelationshipsEnum::NATURAL_STONE_GRADE->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        NaturalStone::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        NaturalStone::findOrFail($id)->delete();
    }
}
