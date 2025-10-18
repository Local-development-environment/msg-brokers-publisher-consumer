<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships;

use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships\NeckSizesBeadsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class NeckSizesBeadsRelationshipService
{
    public function __construct(public NeckSizesBeadsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}