<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletSizes\Services\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletSizes\Repositories\Relationships\BraceletSizeBraceletMetricsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class BraceletSizeBraceletMetricsRelationshipService
{
    public function __construct(public BraceletSizeBraceletMetricsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
