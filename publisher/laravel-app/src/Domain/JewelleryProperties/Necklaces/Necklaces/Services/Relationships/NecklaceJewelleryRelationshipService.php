<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships\NecklaceJewelleryRelationshipRepository;

final class NecklaceJewelleryRelationshipService
{
    public function __construct(public NecklaceJewelleryRelationshipRepository $repository)
    {
    }

    public function index($id): Jewellery
    {
        return $this->repository->index($id);
    }
}