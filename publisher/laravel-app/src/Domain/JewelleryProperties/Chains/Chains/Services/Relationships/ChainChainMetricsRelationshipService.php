<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Services\Relationships;

use Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships\ChainChainMetricsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class ChainChainMetricsRelationshipService
{
    public function __construct(public ChainChainMetricsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}