<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Services\Relationships;

use Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships\ChainsWeavingsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class ChainsWeavingsRelationshipService
{
    public function __construct(public ChainsWeavingsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}