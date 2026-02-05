<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Repositories\Relationships\JewelleryBeadRelationshipRepository;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

final class JewelleryBeadRelationshipService
{
    public function __construct(public JewelleryBeadRelationshipRepository $repository)
    {
    }

    public function index($id): Bead
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
