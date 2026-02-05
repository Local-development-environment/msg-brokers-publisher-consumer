<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\InsertViews\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\InsertViews\Models\VInsert;
use JewelleryDomain\Jewelleries\Inserts\InsertViews\Repositories\VInsertCachedRepositoryInterface;

class VInsertService
{
    public function __construct(
        public VInsertCachedRepositoryInterface $repository
    ) {
    }

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    public function show(array $data, int $id): VInsert
    {
        return $this->repository->show($data, $id);
    }
}
