<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Repositories\Relationships;

use Domain\Medias\MediaVideos\VideoDetails\Models\VideoDetail;
use Domain\Medias\Shared\VideoTypes\Models\VideoType;

final class VideoDetailsVideoTypeRelationshipRepository
{
    public function index(int $id): VideoType
    {
        return VideoDetail::findOrFail($id)->videoType;
    }

    public function update(array $data, int $id): void
    {

    }
}