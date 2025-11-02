<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Repositories\Relationships;

use Domain\Medias\MediaVideos\Videos\Models\Video;
use Illuminate\Database\Eloquent\Collection;

final class VideoVideoDetailsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Video::findOrFail($id)->videoDetails;
    }

    public function update(array $data, int $id): void
    {

    }
}