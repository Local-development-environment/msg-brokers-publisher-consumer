<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Services\Relationships;

use Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships\BeadsClaspRelationshipRepository;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;

final class BeadsClaspRelationshipService
{
    public function __construct(public BeadsClaspRelationshipRepository $repository)
    {
    }

    public function index($id): Clasp
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}