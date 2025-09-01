<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Services;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Jewelleries\JewelleryViews\Repositories\VJewelleryCachedRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

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