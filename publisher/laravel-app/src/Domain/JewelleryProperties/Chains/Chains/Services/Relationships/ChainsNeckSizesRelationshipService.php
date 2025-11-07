<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Services\Relationships;

use Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships\ChainsNeckSizesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class ChainsNeckSizesRelationshipService
{
    public function __construct(public ChainsNeckSizesRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}