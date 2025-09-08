<?php

declare(strict_types=1);

namespace Domain\Inserts\ImitationStones\Repositories;

use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ImitationStoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(ImitationStone::class)
            ->allowedIncludes(['stone'])
            ->allowedFilters([
                AllowedFilter::exact('id')
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
            ->where('id', $id)
            ->allowedIncludes(['stone'])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        ImitationStone::find($id)->update($data);
    }

    public function destroy(int $id): void
    {
        ImitationStone::findOrFail($id)->delete();
    }
}