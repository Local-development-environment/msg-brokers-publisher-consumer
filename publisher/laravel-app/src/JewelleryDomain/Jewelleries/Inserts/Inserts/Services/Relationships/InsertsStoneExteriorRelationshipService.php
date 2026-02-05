<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Services\Relationships;

use Domain\Inserts\StoneExteriours\Models\StoneExterior;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Repositories\Relationships\InsertsStoneExteriorRelationshipRepository;

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
