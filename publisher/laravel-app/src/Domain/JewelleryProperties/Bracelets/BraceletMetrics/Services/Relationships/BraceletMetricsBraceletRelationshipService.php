<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletMetrics\Services\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Repositories\Relationships\BraceletMetricsBraceletRelationshipRepository;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;

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
