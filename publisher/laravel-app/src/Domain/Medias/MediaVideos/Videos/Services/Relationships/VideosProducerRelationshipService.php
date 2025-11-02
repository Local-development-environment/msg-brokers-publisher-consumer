<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Services\Relationships;

use Domain\Medias\MediaVideos\Videos\Repositories\Relationships\VideosProducerRelationshipRepository;
use Domain\Medias\Shared\Producers\Models\Producer;

final class VideosProducerRelationshipService
{
    public function __construct(public VideosProducerRelationshipRepository $repository)
    {
    }

    public function index($id): Producer
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}