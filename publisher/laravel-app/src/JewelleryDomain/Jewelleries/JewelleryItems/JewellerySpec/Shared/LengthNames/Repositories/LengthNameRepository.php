<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Enums\LengthNameEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Enums\LengthNameRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Models\LengthName;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class LengthNameRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(LengthName::class)
            ->allowedIncludes([
                LengthNameRelationshipsEnum::NECK_SIZES->value
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
                LengthNameRelationshipsEnum::NECK_SIZES->value
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
