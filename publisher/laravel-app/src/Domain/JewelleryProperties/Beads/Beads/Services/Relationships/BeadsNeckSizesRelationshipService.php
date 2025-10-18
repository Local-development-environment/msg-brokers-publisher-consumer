<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Services\Relationships;

use Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships\BeadsNeckSizesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class BeadsNeckSizesRelationshipService
{
    public function __construct(public BeadsNeckSizesRelationshipRepository $repository)
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