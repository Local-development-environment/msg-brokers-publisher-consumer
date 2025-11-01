<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Repositories;

use Domain\Medias\MediaVideos\Videos\Enums\VideoEnum;
use Domain\Medias\MediaVideos\Videos\Enums\VideoRelationshipsEnum;
use Domain\Medias\MediaVideos\Videos\Models\Video;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VideoRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Video::class)
            ->allowedIncludes([
                VideoRelationshipsEnum::JEWELLERY->value,
                VideoRelationshipsEnum::PRODUCER->value,
                VideoRelationshipsEnum::VIDEO_TYPES->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(VideoEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Video
    {
        return Video::create($data);
    }

    public function show(array $data, int $id): Video
    {
        return QueryBuilder::for(Video::class)
            ->where(VideoEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                VideoRelationshipsEnum::JEWELLERY->value,
                VideoRelationshipsEnum::PRODUCER->value,
                VideoRelationshipsEnum::VIDEO_TYPES->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Video::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Video::findOrFail($id)->delete();
    }
}