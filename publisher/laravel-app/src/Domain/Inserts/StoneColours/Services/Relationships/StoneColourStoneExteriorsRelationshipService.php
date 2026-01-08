<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneColours\Services\Relationships;

use Domain\Inserts\StoneColours\Repositories\Relationships\StoneColourStoneExteriorsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

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
