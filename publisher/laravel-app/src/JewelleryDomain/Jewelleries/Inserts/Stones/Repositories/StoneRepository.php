<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Stone::from('jw_inserts.stones as s'))
            ->allowedIncludes([
                StoneRelationshipsEnum::TYPE_ORIGIN->value,
                StoneRelationshipsEnum::IMITATION_STONE->value,
                StoneRelationshipsEnum::GROWN_STONE->value,
                StoneRelationshipsEnum::NATURAL_STONE->value,
                StoneRelationshipsEnum::FACETS->value,
                StoneRelationshipsEnum::STONE_COLOURS->value,
                StoneRelationshipsEnum::STONE_EXTERIORS->value,
                StoneRelationshipsEnum::STONE_OPTICAL_EFFECT->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(StoneEnum::PRIMARY_KEY->value),
            ])
            ->join('jw_inserts.type_origins as to', 's.type_origin_id', '=', 'to.id')
            ->select(
                'to.*', 'to.description as to_description', 'to.name as to_name',
                's.*'
            )
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Stone
    {
        return Stone::create($data);
    }

    public function show(array $data, int $id): Stone
    {
        return QueryBuilder::for(Stone::class)
            ->where(StoneEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                StoneRelationshipsEnum::TYPE_ORIGIN->value,
                StoneRelationshipsEnum::IMITATION_STONE->value,
                StoneRelationshipsEnum::GROWN_STONE->value,
                StoneRelationshipsEnum::NATURAL_STONE->value,
                StoneRelationshipsEnum::FACETS->value,
                StoneRelationshipsEnum::STONE_COLOURS->value,
                StoneRelationshipsEnum::STONE_EXTERIORS->value,
                StoneRelationshipsEnum::STONE_OPTICAL_EFFECT->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Stone::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Stone::findOrFail($id)->delete();
    }
}
