<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Services\Relationships;

use Domain\Shared\JewelleryProperties\Clasps\Repositories\Relationships\ClaspBeadsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class ClaspBeadsRelationshipService
{
    public function __construct(public ClaspBeadsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}