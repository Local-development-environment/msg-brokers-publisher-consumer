<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletSizes\Services\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletSizes\Repositories\Relationships\BraceletSizesBraceletsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class BraceletSizesBraceletsRelationshipService
{
    public function __construct(public BraceletSizesBraceletsRelationshipRepository $repository)
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
