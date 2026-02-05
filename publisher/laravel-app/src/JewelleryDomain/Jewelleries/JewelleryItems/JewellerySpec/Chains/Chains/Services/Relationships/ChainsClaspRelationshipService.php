<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Repositories\Relationships\ChainsClaspRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;

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
