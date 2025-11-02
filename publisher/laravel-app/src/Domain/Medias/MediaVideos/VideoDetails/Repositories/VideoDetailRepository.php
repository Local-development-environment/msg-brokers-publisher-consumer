<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Repositories;

use Domain\Medias\MediaVideos\VideoDetails\Enums\VideoDetailEnum;
use Domain\Medias\MediaVideos\VideoDetails\Enums\VideoDetailRelationshipsEnum;
use Domain\Medias\MediaVideos\VideoDetails\Models\VideoDetail;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VideoDetailRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VideoDetail::class)
            ->allowedIncludes([
                VideoDetailRelationshipsEnum::VIDEO->value,
                VideoDetailRelationshipsEnum::VIDEO_TYPE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(VideoDetailEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): VideoDetail
    {
        return VideoDetail::create($data);
    }

    public function show(array $data, int $id): VideoDetail
    {
        return QueryBuilder::for(VideoDetail::class)
            ->where(VideoDetailEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                VideoDetailRelationshipsEnum::VIDEO->value,
                VideoDetailRelationshipsEnum::VIDEO_TYPE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        VideoDetail::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        VideoDetail::findOrFail($id)->delete();
    }
}