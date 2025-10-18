<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships;

use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships\NeckSizeNecklaceMetricsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class NeckSizeNecklaceMetricsRelationshipService
{
    public function __construct(public NeckSizeNecklaceMetricsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}