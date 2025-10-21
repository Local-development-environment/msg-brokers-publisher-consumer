<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships;

use Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships\NecklaceNecklaceMetricsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class NecklaceNecklaceMetricsRelationshipService
{
    public function __construct(public NecklaceNecklaceMetricsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->store($data, $id);
    }
}