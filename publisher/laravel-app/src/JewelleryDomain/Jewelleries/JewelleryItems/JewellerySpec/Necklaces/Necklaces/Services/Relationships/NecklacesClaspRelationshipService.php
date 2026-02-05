<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Repositories\Relationships\NecklacesClaspRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;

final class NecklacesClaspRelationshipService
{
    public function __construct(public NecklacesClaspRelationshipRepository $repository)
    {
    }

    public function index($id): Clasp
    {
        return $this->repository->index($id);
    }
}
