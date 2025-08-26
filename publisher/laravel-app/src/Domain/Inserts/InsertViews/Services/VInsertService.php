<?php

namespace Domain\Inserts\InsertViews\Services;

use Domain\Inserts\InsertViews\Models\VInsert;
use Domain\Inserts\InsertViews\Repositories\VInsertRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class VInsertService
{
    public function __construct(
        public VInsertRepository $repository
    ) {
    }

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    public function show(array $data, int $id): Model|VInsert
    {
        return $this->repository->show($id, $data);
    }
}