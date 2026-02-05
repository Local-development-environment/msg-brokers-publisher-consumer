<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\InsertViews\Repositories;

use Domain\Shared\Repositories\AbstractCachedRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use JewelleryDomain\Jewelleries\Inserts\InsertViews\Models\VInsert;

final class VInsertCachedRepository extends AbstractCachedRepository implements VInsertCachedRepositoryInterface
{
    public function __construct(
        public VInsertRepository $repository
    ) {
    }

    public function index(array $data): Paginator
    {
        return Cache::tags([VInsert::class])->remember($this->getCacheKey($data), $this->getTtl(),
            function () use ($data) {
                return $this->repository->index($data);
            });
    }

    public function show(array $data, int $id): VInsert
    {
        return Cache::tags([VInsert::class])->remember($this->getCacheKey($data), $this->getTtl(),
            function () use ($id, $data) {
                return $this->repository->show($data, $id);
            });
    }
}
