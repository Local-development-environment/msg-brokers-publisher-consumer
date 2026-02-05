<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneColours\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Repositories\Relationships\StoneColourStoneExteriorsRelationshipRepository;

final class StoneColourStoneExteriorsRelationshipService
{
    public function __construct(public StoneColourStoneExteriorsRelationshipRepository $repository)
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
