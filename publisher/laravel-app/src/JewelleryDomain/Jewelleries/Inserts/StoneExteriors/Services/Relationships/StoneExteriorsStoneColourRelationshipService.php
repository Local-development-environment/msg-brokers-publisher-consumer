<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\StoneColours\Models\StoneColour;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Repositories\Relationships\StoneExteriorsColourRelationshipRepository;

final class StoneExteriorsStoneColourRelationshipService
{
    public function __construct(public StoneExteriorsColourRelationshipRepository $repository)
    {
    }

    public function index($id): StoneColour
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
