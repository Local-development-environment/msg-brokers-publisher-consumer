<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Services;

use Domain\Inserts\InsertExteriors\Models\InsertExterior;
use Domain\Inserts\InsertExteriors\Repositories\InsertExteriorRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class InsertExteriorService
{
    public function __construct(
        public InsertExteriorRepository $repository,
//        public InsertStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): InsertExterior
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): InsertExterior
    {
        return $this->repository->show($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
//        $this->pipeline->update($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
//        $this->pipeline->destroy($id);
    }
}