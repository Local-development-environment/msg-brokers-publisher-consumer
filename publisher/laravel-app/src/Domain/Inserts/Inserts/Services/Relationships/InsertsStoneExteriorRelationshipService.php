<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Services\Relationships;

use Domain\Inserts\Inserts\Repositories\Relationships\InsertsStoneExteriorRelationshipRepository;
use Domain\Inserts\StoneExteriours\Models\StoneExterior;

final class InsertsStoneExteriorRelationshipService
{
    public function __construct(public InsertsStoneExteriorRelationshipRepository $repository)
    {
    }

    public function index($id): StoneExterior
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}