<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Services;

use Domain\Medias\Shared\MediaTypes\Repositories\Relationships\VideoTypeVideoDetailsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class VideoTypeVideoDetailsRelationshipService
{
    public function __construct(public VideoTypeVideoDetailsRelationshipRepository $repository)
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