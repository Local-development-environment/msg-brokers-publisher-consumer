<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\Relationships\BeadBeadMetricsRelationshipRepository;

final class BeadBeadMetricsRelationshipService
{
    public function __construct(public BeadBeadMetricsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function store($data): void
    {
        $items = data_get($data, 'data.relationships.beadMetrics.data');

        $this->repository->store(data_forget($items, '*.type'));
    }
}
