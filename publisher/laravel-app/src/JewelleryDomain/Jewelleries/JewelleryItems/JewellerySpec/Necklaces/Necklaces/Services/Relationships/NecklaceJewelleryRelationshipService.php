<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Repositories\Relationships\NecklaceJewelleryRelationshipRepository;

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
