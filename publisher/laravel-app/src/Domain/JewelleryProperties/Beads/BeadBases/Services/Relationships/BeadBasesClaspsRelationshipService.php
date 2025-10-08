<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadBases\Repositories\Relationships\BeadBasesClaspsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class BeadBasesClaspsRelationshipService
{
    public function __construct(public BeadBasesClaspsRelationshipRepository $repository)
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