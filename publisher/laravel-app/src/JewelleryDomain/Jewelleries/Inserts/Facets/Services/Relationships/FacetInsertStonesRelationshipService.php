<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Facets\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\Facets\Repositories\Relationships\FacetInsertStonesRelationshipRepository;

final class FacetInsertStonesRelationshipService
{
    public function __construct(public FacetInsertStonesRelationshipRepository $repository)
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
