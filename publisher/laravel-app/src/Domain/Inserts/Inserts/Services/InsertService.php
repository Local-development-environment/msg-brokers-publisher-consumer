<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Services;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\Inserts\Repositories\InsertRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class InsertService
{
    public function __construct(
        public InsertRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Insert
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Insert
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