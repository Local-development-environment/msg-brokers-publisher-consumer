<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Repositories\Relationships\BeadMetricsBeadRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

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
