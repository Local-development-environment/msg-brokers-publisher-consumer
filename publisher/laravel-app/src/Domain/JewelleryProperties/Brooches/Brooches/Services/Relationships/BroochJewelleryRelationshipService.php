<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Brooches\Brooches\Services\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Brooches\Brooches\Repositories\Relationships\BroochJewelleryRelationshipRepository;

final class BroochJewelleryRelationshipService
{
    public function __construct(public BroochJewelleryRelationshipRepository $repository)
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