<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Services\Relationships;

use Domain\Medias\MediaVideos\Videos\Repositories\Relationships\VideoVideoDetailsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class VideoVideoDetailsRelationshipService
{
    public function __construct(public VideoVideoDetailsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}