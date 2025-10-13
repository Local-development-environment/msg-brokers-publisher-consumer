<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\Relationships\BeadMetricsBeadRelationshipRepository;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;

final class BeadMetricsBeadRelationshipService
{
    public function __construct(public BeadMetricsBeadRelationshipRepository $repository)
    {
    }

    public function index($id): Bead
    {
        return $this->repository->index($id);
    }
}