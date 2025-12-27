<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Services\Relationships;

use Domain\Medias\Shared\MediaTypes\Repositories\Relationships\MediaTypeMediaReviewsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class MediaTypeMediaReviewsRelationshipService
{
    public function __construct(public MediaTypeMediaReviewsRelationshipRepository $repository)
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