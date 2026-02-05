<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\Inserts\Repositories\Relationships\InsertsJewelleryRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;

final class InsertsJewelleryRelationshipService
{
    public function __construct(public InsertsJewelleryRelationshipRepository $repository)
    {
    }

    public function index($id): Jewellery
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
