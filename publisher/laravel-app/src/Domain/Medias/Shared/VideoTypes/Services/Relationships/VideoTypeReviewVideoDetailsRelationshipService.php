<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\VideoTypes\Services\Relationships;

use Domain\Medias\Shared\VideoTypes\Repositories\Relationships\VideoTypeReviewVideoDetailsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class VideoTypeReviewVideoDetailsRelationshipService
{
    public function __construct(public VideoTypeReviewVideoDetailsRelationshipRepository $repository)
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