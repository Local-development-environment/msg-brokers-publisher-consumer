<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships;

use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships\NeckSizesNecklacesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class NeckSizesNecklacesRelationshipService
{
    public function __construct(public NeckSizesNecklacesRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}