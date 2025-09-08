<?php

declare(strict_types=1);

namespace Domain\Inserts\TypeOrigins\Repositories;

use Domain\Inserts\TypeOrigins\Models\TypeOrigin;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneTypeOriginRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(TypeOrigin::class)
            ->allowedIncludes(['stones'])
            ->allowedFilters([
                AllowedFilter::exact('id')
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): TypeOrigin
    {
        return TypeOrigin::create($data);
    }

    public function show(array $data, int $id): TypeOrigin
    {
        return QueryBuilder::for(TypeOrigin::class)
            ->where('id', $id)
            ->allowedIncludes(['stones'])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        TypeOrigin::find($id)->update($data);
    }

    public function destroy(int $id): void
    {
        TypeOrigin::findOrFail($id)->delete();
    }
}