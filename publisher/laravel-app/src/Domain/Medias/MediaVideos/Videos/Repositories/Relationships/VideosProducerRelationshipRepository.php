<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Repositories\Relationships;

use Domain\Medias\MediaVideos\Videos\Models\Video;
use Domain\Medias\Shared\Producers\Models\Producer;

final class VideosProducerRelationshipRepository
{
    public function index(int $id): Producer
    {
        return Video::findOrFail($id)->producer;
    }

    public function update(array $data, int $id): void
    {

    }
}