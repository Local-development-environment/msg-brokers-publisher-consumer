<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Services\Relationships;

use Domain\Shared\JewelleryProperties\Clasps\Repositories\Relationships\ClaspsBeadBasesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class ClaspsBeadBasesRelationshipService
{
    public function __construct(public ClaspsBeadBasesRelationshipRepository $repository)
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