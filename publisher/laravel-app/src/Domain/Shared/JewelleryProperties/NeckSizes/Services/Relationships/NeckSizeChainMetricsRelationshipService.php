<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships;

use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships\NeckSizeChainMetricsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class NeckSizeChainMetricsRelationshipService
{
    public function __construct(public NeckSizeChainMetricsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}