<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Repositories\Relationships;

use Domain\Medias\MediaVideos\VideoDetails\Models\VideoDetail;
use Domain\Medias\MediaVideos\Videos\Models\Video;

final class VideoDetailsVideoRelationshipRepository
{
    public function index(int $id): Video
    {
        return VideoDetail::findOrFail($id)->video;
    }

    public function update(array $data, int $id): void
    {

    }
}