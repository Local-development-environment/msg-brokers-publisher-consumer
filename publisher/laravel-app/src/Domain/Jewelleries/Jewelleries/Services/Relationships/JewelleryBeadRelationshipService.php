<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Services\Relationships;

use Domain\Jewelleries\Jewelleries\Repositories\Relationships\JewelleryBeadRelationshipRepository;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;

final class JewelleryBeadRelationshipService
{
    public function __construct(public JewelleryBeadRelationshipRepository $repository)
    {
    }

    public function index($id): Bead
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}