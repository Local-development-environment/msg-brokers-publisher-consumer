<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships;

use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships\NeckSizesChainsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class NeckSizesChainsRelationshipService
{
    public function __construct(public NeckSizesChainsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}