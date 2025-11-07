<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Services\Relationships;

use Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships\ChainChainWeavingsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class ChainChainWeavingsRelationshipService
{
    public function __construct(public ChainChainWeavingsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}