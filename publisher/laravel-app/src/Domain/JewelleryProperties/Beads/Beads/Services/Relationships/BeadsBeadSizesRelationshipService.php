<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Services\Relationships;

use Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships\BeadsBeadSizesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class BeadsBeadSizesRelationshipService
{
    public function __construct(public BeadsBeadSizesRelationshipRepository $repository)
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