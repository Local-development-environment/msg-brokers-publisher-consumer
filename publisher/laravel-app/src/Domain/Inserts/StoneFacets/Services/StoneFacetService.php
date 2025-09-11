<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneFacets\Services;

use Domain\Inserts\StoneFacets\Models\StoneFacet;
use Domain\Inserts\StoneFacets\Repositories\StoneFacetRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class StoneFacetService
{
    public function __construct(
        public StoneFacetRepository $repository,
//        public InsertStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneFacet
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneFacet
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