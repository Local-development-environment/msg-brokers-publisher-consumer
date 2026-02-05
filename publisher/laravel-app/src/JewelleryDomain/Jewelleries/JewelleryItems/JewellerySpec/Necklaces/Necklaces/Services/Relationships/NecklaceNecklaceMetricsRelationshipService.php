<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Repositories\Relationships\NecklaceNecklaceMetricsRelationshipRepository;

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
