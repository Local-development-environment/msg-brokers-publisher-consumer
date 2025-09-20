<?php

declare(strict_types=1);

namespace Domain\Auth\Users\Repositories;

use Domain\Auth\Users\Enums\VUserEnum;
use Domain\Auth\Users\Models\VUser;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VUserRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VUser::class)
            ->allowedIncludes([
//                InsertRelationshipsEnum::INSERT_STONE->value,
//                InsertRelationshipsEnum::JEWELLERY->value,
//                InsertRelationshipsEnum::OPTIONAL_INFO->value,
//                InsertRelationshipsEnum::METRIC->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(VUserEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): VUser
    {
        return VUser::create($data);
    }

    public function show(array $data, int $id): VUser
    {
        return QueryBuilder::for(VUser::class)
            ->where('id', $id)
            ->allowedIncludes([
//                InsertRelationshipsEnum::INSERT_STONE->value,
//                InsertRelationshipsEnum::JEWELLERY->value,
//                InsertRelationshipsEnum::OPTIONAL_INFO->value,
//                InsertRelationshipsEnum::METRIC->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        VUser::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        VUser::findOrFail($id)->delete();
    }
}