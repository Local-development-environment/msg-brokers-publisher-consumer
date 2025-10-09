<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\Relationships\BeadMetricsBeadSizeRelationshipRepository;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;

final class BeadMetricsBeadSizeRelationshipService
{
    public function __construct(public BeadMetricsBeadSizeRelationshipRepository $repository)
    {
    }

    public function index($id): BeadSize
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}