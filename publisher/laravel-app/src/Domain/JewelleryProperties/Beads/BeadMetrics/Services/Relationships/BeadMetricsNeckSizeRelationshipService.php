<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\Relationships\BeadMetricsNeckSizeRelationshipRepository;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;

final class BeadMetricsNeckSizeRelationshipService
{
    public function __construct(public BeadMetricsNeckSizeRelationshipRepository $repository)
    {
    }

    public function index($id): NeckSize
    {
        return $this->repository->index($id);
    }
}