<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadBases\Repositories\Relationships\BeadBaseBeadsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class BeadBaseBeadsRelationshipService
{
    public function __construct(public BeadBaseBeadsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}