<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadSizes\Repositories\Relationships\BeadSizesBeadsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class BeadSizesBeadsRelationshipService
{
    public function __construct(public BeadSizesBeadsRelationshipRepository $repository)
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