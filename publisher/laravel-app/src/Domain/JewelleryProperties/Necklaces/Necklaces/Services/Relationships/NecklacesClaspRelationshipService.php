<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships;

use Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships\NecklacesClaspRelationshipRepository;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;

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