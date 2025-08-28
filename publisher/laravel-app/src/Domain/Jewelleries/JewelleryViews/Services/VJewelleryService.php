<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Services;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Jewelleries\JewelleryViews\Repositories\VJewelleryCachedRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

final class VJewelleryService
{
    public function __construct(public VJewelleryCachedRepositoryInterface $repository)
    {
    }

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    public function show(array $data, int $id): VJewellery
    {
        return $this->repository->show($data, $id);
    }
}