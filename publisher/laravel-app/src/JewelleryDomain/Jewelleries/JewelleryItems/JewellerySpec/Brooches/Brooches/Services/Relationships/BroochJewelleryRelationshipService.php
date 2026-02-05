<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Repositories\Relationships\BroochJewelleryRelationshipRepository;

final class BroochJewelleryRelationshipService
{
    public function __construct(public BroochJewelleryRelationshipRepository $repository)
    {
    }

    public function index($id): Jewellery
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
