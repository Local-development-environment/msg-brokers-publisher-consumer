<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Services\Relationships;

use Domain\Inserts\Colours\Models\Colour;
use Domain\Inserts\InsertExteriors\Repositories\Relationships\InsertExteriorsColourRelationshipRepository;

final class InsertExteriorsStoneColourRelationshipService
{
    public function __construct(public InsertExteriorsColourRelationshipRepository $repository)
    {
    }

    public function index($id): Colour
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}