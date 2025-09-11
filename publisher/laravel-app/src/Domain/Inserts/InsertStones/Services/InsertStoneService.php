<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Services;

use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\InsertStones\Repositories\InsertStoneRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class InsertStoneService
{
    public function __construct(
        public InsertStoneRepository $repository,
//        public InsertStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): InsertStone
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): InsertStone
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