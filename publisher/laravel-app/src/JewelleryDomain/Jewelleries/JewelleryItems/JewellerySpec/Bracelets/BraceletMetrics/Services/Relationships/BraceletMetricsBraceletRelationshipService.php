<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Repositories\Relationships\BraceletMetricsBraceletRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;

final class BraceletMetricsBraceletRelationshipService
{
    public function __construct(public BraceletMetricsBraceletRelationshipRepository $repository)
    {
    }

    public function index($id): Bracelet
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
