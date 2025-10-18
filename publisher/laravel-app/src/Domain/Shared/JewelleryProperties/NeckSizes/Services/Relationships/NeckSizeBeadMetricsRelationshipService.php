<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships;

use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships\NeckSizeBeadMetricsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class NeckSizeBeadMetricsRelationshipService
{
    public function __construct(public NeckSizeBeadMetricsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}