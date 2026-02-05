<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Services\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Repositories\Relationships\BraceletJewelleryRelationshipRepository;

final class BraceletJewelleryRelationshipService
{
    public function __construct(public BraceletJewelleryRelationshipRepository $repository)
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
