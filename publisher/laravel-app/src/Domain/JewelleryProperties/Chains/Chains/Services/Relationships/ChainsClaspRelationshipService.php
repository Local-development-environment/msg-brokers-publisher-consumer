<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Services\Relationships;

use Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships\ChainsClaspRelationshipRepository;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;

final class ChainsClaspRelationshipService
{
    public function __construct(public ChainsClaspRelationshipRepository $repository)
    {
    }

    public function index($id): Clasp
    {
        return $this->repository->index($id);
    }
}