<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriors\Services\Relationships;

use Domain\Inserts\Colours\Models\StoneColour;
use Domain\Inserts\StoneExteriors\Repositories\Relationships\StoneExteriorsColourRelationshipRepository;

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
