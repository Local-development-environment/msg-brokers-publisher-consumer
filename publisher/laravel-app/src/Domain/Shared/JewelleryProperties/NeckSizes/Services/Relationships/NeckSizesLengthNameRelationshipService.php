<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships;

use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships\NeckSizesLengthNameRelationshipRepository;

final class NeckSizesLengthNameRelationshipService
{
    public function __construct(public NeckSizesLengthNameRelationshipRepository $repository)
    {
    }

    public function index($id): LengthName
    {
        return $this->repository->index($id);
    }
}