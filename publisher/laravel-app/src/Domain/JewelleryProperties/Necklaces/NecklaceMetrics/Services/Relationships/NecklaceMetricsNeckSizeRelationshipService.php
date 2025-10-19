<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services\Relationships;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Repositories\Relationships\NecklaceMetricsNeckSizeRelationshipRepository;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;

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