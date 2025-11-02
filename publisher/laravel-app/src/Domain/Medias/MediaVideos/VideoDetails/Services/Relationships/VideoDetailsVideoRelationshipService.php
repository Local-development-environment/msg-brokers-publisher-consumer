<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Services\Relationships;

use Domain\Medias\MediaVideos\VideoDetails\Repositories\Relationships\VideoDetailsVideoRelationshipRepository;
use Domain\Medias\MediaVideos\Videos\Models\Video;

final class VideoDetailsVideoRelationshipService
{
    public function __construct(public VideoDetailsVideoRelationshipRepository $repository)
    {
    }

    public function index($id): Video
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}