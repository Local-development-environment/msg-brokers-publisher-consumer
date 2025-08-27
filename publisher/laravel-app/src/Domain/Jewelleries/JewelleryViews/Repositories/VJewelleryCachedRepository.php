<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Shared\AbstractCachedRepository;
use Domain\Shared\CachedRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

final class VJewelleryCachedRepository extends AbstractCachedRepository implements CachedRepositoryInterface
{
    public function __construct(readonly private VJewelleryRepository $repository)
    {
    }

    public function index(array $data): Paginator
    {
//        return Cache::tags([VJewellery::class])->remember($this->getCacheKey($data), $this->getTtl(),
//            function () use ($data) {
//                return $this->repository->index($data);
//            });
    }

    public function show(array $data, int $id): VJewellery
    {
//        return Cache::tags([VJewellery::class])->remember($this->getCacheKey($data), $this->getTtl(),
//            function () use ($id, $data) {
//                return $this->repository->show($data, $id);
//            });
    }
}