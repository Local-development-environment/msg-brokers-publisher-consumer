<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletBases\Repositories;

use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseRelationshipsEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Models\BraceletBase;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BraceletBaseRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BraceletBase::class)
            ->allowedIncludes([
                BraceletBaseRelationshipsEnum::BRACELETS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BraceletBaseEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BraceletBase
    {
        return BraceletBase::create($data);
    }

    public function show(array $data, int $id): BraceletBase
    {
        return QueryBuilder::for(BraceletBase::class)
            ->where(BraceletBaseEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BraceletBaseRelationshipsEnum::BRACELETS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BraceletBase::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BraceletBase::findOrFail($id)->delete();
    }
}
