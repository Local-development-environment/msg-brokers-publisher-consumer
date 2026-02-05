<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Repositories\Relationships\NecklaceMetricsNecklaceRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Models\Necklace;

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
