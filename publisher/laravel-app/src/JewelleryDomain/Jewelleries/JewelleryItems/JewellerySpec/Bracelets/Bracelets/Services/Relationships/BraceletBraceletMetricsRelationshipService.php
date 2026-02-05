<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Repositories\Relationships\BraceletBraceletMetricsRelationshipRepository;

final class BraceletBraceletMetricsRelationshipService
{
    public function __construct(public BraceletBraceletMetricsRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function store($data): void
    {
        $items = data_get($data, 'data.relationships.braceletMetrics.data');

        $this->repository->store(data_forget($items, '*.type'));
    }
}
