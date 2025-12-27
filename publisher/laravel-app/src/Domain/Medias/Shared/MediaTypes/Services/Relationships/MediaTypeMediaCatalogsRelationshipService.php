<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Services\Relationships;

use Domain\Medias\Shared\MediaTypes\Repositories\Relationships\MediaTypeMediaCatalogsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class MediaTypeMediaCatalogsRelationshipService
{
    public function __construct(public MediaTypeMediaCatalogsRelationshipRepository $repository)
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