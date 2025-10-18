<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\Relationships\BeadMetricsNeckSizeRelationshipRepository;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;

final class BeadMetricsNeckSizeRelationshipService
{
    public function __construct(public BeadMetricsNeckSizeRelationshipRepository $repository)
    {
    }

    public function index($id): BeadSize
    {
        return $this->repository->index($id);
    }
}