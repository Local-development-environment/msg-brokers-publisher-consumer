<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertViews\Services;

use Domain\Inserts\InsertViews\Models\VInsert;
use Domain\Shared\CachedRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class VInsertService
{
    public function __construct(
        public CachedRepositoryInterface $repository
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
