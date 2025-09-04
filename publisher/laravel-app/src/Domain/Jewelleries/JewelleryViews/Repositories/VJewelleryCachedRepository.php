<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Shared\Repositories\AbstractCachedRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

final class VJewelleryCachedRepository extends AbstractCachedRepository implements VJewelleryCachedRepositoryInterface
{
    public function __construct(readonly private VJewelleryRepository $repository)
    {
    }

    public function index(array $params): Collection
    {
        return Cache::tags([VJewellery::class])->remember($this->getCacheKey($params), $this->getTtl(),
            function () use ($params) {
                return $this->repository->index($params);
            });
    }

    public function show(array $params, int $id): VJewellery
    {
        return Cache::tags([VJewellery::class])->remember($this->getCacheKey($params), $this->getTtl(),
            function () use ($id, $params) {
                return $this->repository->show($params, $id);
            });
    }
}