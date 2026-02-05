<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Models\LengthName;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Repositories\Relationships\NeckSizesLengthNameRelationshipRepository;

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
