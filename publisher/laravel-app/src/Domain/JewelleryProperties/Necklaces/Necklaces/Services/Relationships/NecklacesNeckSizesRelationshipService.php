<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships;

use Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships\NecklacesNeckSizesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class NecklacesNeckSizesRelationshipService
{
    public function __construct(public NecklacesNeckSizesRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}