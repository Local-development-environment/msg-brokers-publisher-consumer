<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoTypes\Repositories;

use Domain\Medias\MediaVideos\VideoTypes\Enums\VideoTypeEnum;
use Domain\Medias\MediaVideos\VideoTypes\Enums\VideoTypeRelationshipsEnum;
use Domain\Medias\MediaVideos\VideoTypes\Models\VideoType;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VideoTypeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VideoType::class)
            ->allowedIncludes([
                VideoTypeRelationshipsEnum::VIDEO_DETAILS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(VideoTypeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): VideoType
    {
        return VideoType::create($data);
    }

    public function show(array $data, int $id): VideoType
    {
        return QueryBuilder::for(VideoType::class)
            ->where(VideoTypeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                VideoTypeRelationshipsEnum::VIDEO_DETAILS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        VideoType::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        VideoType::findOrFail($id)->delete();
    }
}