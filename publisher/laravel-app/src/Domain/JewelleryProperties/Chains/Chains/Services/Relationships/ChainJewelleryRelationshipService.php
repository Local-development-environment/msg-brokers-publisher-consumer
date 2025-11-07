<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Services\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships\ChainJewelleryRelationshipRepository;

final class ChainJewelleryRelationshipService
{
    public function __construct(public ChainJewelleryRelationshipRepository $repository)
    {
    }

    public function index($id): Jewellery
    {
        return $this->repository->index($id);
    }
}