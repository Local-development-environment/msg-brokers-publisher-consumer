<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Enums\BeadBaseEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Enums\BeadBaseRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Models\BeadBase;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BeadBaseRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BeadBase::class)
            ->allowedIncludes([
                BeadBaseRelationshipsEnum::BEADS->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(BeadBaseEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BeadBase
    {
        return BeadBase::create($data);
    }

    public function show(array $data, int $id): BeadBase
    {
        return QueryBuilder::for(BeadBase::class)
            ->where(BeadBaseEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BeadBaseRelationshipsEnum::BEADS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BeadBase::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BeadBase::findOrFail($id)->delete();
    }
}
