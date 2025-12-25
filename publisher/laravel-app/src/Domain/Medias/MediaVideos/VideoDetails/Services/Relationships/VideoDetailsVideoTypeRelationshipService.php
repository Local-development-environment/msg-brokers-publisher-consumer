<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Services\Relationships;

use Domain\Medias\MediaVideos\VideoDetails\Repositories\Relationships\VideoDetailsVideoTypeRelationshipRepository;
use Domain\Medias\Shared\VideoTypes\Models\VideoType;

final class VideoDetailsVideoTypeRelationshipService
{
    public function __construct(public VideoDetailsVideoTypeRelationshipRepository $repository)
    {
    }

    public function index($id): VideoType
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}