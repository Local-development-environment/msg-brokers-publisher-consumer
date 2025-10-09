<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Services\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships\BeadJewelleryRelationshipRepository;

final class BeadJewelleryRelationshipService
{
    public function __construct(public BeadJewelleryRelationshipRepository $repository)
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