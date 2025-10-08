<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Services\Relationships;

use Domain\JewelleryProperties\Beads\BeadSizes\Repositories\Relationships\BeadSizesLengthNameRelationshipRepository;
use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;

final class BeadSizesLengthNameRelationshipService
{
    public function __construct(public BeadSizesLengthNameRelationshipRepository $repository)
    {
    }

    public function index($id): LengthName
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}