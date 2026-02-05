<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\ImitationStones\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums\ImitationStoneRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Models\ImitationStone;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ImitationStoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(ImitationStone::class)
            ->allowedIncludes([
                ImitationStoneRelationshipsEnum::STONE->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(ImitationStoneEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): ImitationStone
    {
        return ImitationStone::create($data);
    }

    public function show(array $data, int $id): ImitationStone
    {
        return QueryBuilder::for(ImitationStone::class)
            ->where(ImitationStoneEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ImitationStoneRelationshipsEnum::STONE->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        ImitationStone::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        ImitationStone::findOrFail($id)->delete();
    }
}
