<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services\Relationships;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Repositories\Relationships\NecklaceMetricsNecklaceRelationshipRepository;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;

final class NecklaceMetricsNecklaceRelationshipService
{
    public function __construct(public NecklaceMetricsNecklaceRelationshipRepository $repository)
    {
    }

    public function index($id): Necklace
    {
        return $this->repository->index($id);
    }
}