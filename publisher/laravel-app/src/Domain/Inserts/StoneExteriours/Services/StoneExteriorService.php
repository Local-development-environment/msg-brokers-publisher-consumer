<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriours\Services;

use Domain\Inserts\StoneExteriours\Models\StoneExterior;
use Domain\Inserts\StoneExteriours\Repositories\StoneExteriorRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class StoneExteriorService
{
    public function __construct(
        public StoneExteriorRepository $repository,
//        public InsertStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneExterior
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneExterior
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