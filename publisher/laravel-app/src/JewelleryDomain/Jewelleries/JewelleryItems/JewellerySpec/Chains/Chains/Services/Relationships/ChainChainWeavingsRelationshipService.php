<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Repositories\Relationships\ChainChainWeavingsRelationshipRepository;

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
