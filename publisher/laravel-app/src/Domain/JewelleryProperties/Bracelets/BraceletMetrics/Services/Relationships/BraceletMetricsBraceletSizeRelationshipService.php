<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletMetrics\Services\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Repositories\Relationships\BraceletMetricsBraceletSizeRelationshipRepository;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;

final class BraceletMetricsBraceletSizeRelationshipService
{
    public function __construct(public BraceletMetricsBraceletSizeRelationshipRepository $repository)
    {
    }

    public function index($id): BraceletSize
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
