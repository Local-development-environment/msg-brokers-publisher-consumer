<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BodyParts\Repositories;

use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartEnum;
use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartRelationshipsEnum;
use Domain\JewelleryProperties\Bracelets\BodyParts\Models\BodyPart;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BodyPartRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BodyPart::class)
            ->allowedIncludes([
                BodyPartRelationshipsEnum::BRACELETS->value,
                BodyPartRelationshipsEnum::BRACELET_BASES->value,
                BodyPartRelationshipsEnum::CLASPS->value,
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
                BodyPartRelationshipsEnum::BRACELETS->value,
                BodyPartRelationshipsEnum::BRACELET_BASES->value,
                BodyPartRelationshipsEnum::CLASPS->value,
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
