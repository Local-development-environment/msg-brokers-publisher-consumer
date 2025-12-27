<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Repositories;

use Domain\Medias\Shared\MediaTypes\Enums\MediaTypeEnum;
use Domain\Medias\Shared\MediaTypes\Enums\MediaTypeRelationshipsEnum;
use Domain\Medias\Shared\MediaTypes\Models\MediaType;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class MediaTypeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(MediaType::class)
            ->allowedIncludes([
                MediaTypeRelationshipsEnum::MEDIA_CATALOGS->value,
                MediaTypeRelationshipsEnum::MEDIA_REVIEWS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(MediaTypeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): MediaType
    {
        return MediaType::create($data);
    }

    public function show(array $data, int $id): MediaType
    {
        return QueryBuilder::for(MediaType::class)
            ->where(MediaTypeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                MediaTypeRelationshipsEnum::MEDIA_CATALOGS->value,
                MediaTypeRelationshipsEnum::MEDIA_REVIEWS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        MediaType::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        MediaType::findOrFail($id)->delete();
    }
}