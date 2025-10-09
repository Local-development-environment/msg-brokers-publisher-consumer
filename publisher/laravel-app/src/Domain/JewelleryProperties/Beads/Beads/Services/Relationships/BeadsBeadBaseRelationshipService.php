<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships\BeadsBeadBaseRelationshipRepository;

final class BeadsBeadBaseRelationshipService
{
    public function __construct(public BeadsBeadBaseRelationshipRepository $repository)
    {
    }

    public function index($id): BeadBase
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}