<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Services\Relationships;

use Domain\Shared\JewelleryProperties\LengthNames\Repositories\Relationships\LengthNameBeadSizesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class LengthNameBeadSizesRelationshipService
{
    public function __construct(public LengthNameBeadSizesRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }
}