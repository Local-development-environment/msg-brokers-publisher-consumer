<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Repositories;

use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameRelationshipsEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class LengthNameRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(LengthName::class)
            ->allowedIncludes([
                LengthNameRelationshipsEnum::BEAD_SIZES->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(LengthNameEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): LengthName
    {
        return LengthName::create($data);
    }

    public function show(array $data, int $id): LengthName
    {
        return QueryBuilder::for(LengthName::class)
            ->where(LengthNameEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                LengthNameRelationshipsEnum::BEAD_SIZES->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        LengthName::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        LengthName::findOrFail($id)->delete();
    }
}