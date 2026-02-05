<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Enums\TieClipEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Enums\TieClipRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Models\TieClip;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class TieClipRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(TieClip::class)
            ->allowedIncludes([
                TieClipRelationshipsEnum::JEWELLERY->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(TieClipEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): TieClip
    {
        return TieClip::create($data);
    }

    public function show(array $data, int $id): TieClip
    {
        return QueryBuilder::for(TieClip::class)
            ->where(TieClipEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                TieClipRelationshipsEnum::JEWELLERY->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        TieClip::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        TieClip::findOrFail($id)->delete();
    }
}
