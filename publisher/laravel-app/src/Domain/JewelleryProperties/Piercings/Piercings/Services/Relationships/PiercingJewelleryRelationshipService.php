<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Piercings\Piercings\Services\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Piercings\Piercings\Repositories\Relationships\PiercingJewelleryRelationshipRepository;

final class PiercingJewelleryRelationshipService
{
    public function __construct(public PiercingJewelleryRelationshipRepository $repository)
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