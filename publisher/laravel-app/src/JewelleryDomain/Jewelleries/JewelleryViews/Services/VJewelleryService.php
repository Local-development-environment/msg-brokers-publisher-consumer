<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryViews\Services;

use Illuminate\Support\Collection;
use JewelleryDomain\Jewelleries\JewelleryViews\Models\VJewellery;
use JewelleryDomain\Jewelleries\JewelleryViews\Repositories\VJewelleryCachedRepositoryInterface;

final class VJewelleryService
{
    public function __construct(public VJewelleryCachedRepositoryInterface $repository)
    {
    }

    public function index(array $params): Collection
    {
        return $this->repository->index($params);
    }

    public function show(array $params, int $id): VJewellery
    {
        return $this->repository->show($params, $id);
    }
}
