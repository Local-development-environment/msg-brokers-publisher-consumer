<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Repositories\Relationships\NecklaceMetricsNeckSizeRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class NecklaceMetricsNeckSizeRelationshipService
{
    public function __construct(public NecklaceMetricsNeckSizeRelationshipRepository $repository)
    {
    }

    public function index($id): NeckSize
    {
        return $this->repository->index($id);
    }
}
