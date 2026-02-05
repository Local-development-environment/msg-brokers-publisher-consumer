<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Repositories\Relationships\BeadMetricsNeckSizeRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

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
