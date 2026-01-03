<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\Bracelets\Services\Relationships;

use Domain\JewelleryProperties\Bracelets\Bracelets\Repositories\Relationships\BraceletsBraceletSizesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class BraceletsBraceletSizesRelationshipService
{
    public function __construct(public BraceletsBraceletSizesRelationshipRepository $repository)
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
