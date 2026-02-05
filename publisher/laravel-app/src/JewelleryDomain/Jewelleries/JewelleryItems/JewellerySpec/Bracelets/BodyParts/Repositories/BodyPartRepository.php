<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Enums\BodyPartEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Enums\BodyPartRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Models\BodyPart;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BodyPartRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BodyPart::class)
            ->allowedIncludes([
                BodyPartRelationshipsEnum::BRACELETS->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(BodyPartEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BodyPart
    {
        return BodyPart::create($data);
    }

    public function show(array $data, int $id): BodyPart
    {
        return QueryBuilder::for(BodyPart::class)
            ->where(BodyPartEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BodyPartRelationshipsEnum::BRACELETS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BodyPart::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BodyPart::findOrFail($id)->delete();
    }
}
