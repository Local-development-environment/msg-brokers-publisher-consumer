<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Repositories;

use Domain\Medias\MediaPictures\Pictures\Enums\PictureEnum;
use Domain\Medias\MediaPictures\Pictures\Enums\PictureRelationshipsEnum;
use Domain\Medias\MediaPictures\Pictures\Models\Picture;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class PictureRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Picture::class)
            ->allowedIncludes([
                PictureRelationshipsEnum::JEWELLERY->value,
                PictureRelationshipsEnum::PRODUCER->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(PictureEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Picture
    {
        return Picture::create($data);
    }

    public function show(array $data, int $id): Picture
    {
        return QueryBuilder::for(Picture::class)
            ->where(PictureEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                PictureRelationshipsEnum::JEWELLERY->value,
                PictureRelationshipsEnum::PRODUCER->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Picture::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Picture::findOrFail($id)->delete();
    }
}