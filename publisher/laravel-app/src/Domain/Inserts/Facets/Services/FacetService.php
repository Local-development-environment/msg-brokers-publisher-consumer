<?php

declare(strict_types=1);

namespace Domain\Inserts\Facets\Services;

use Domain\Inserts\Facets\Models\Facet;
use Domain\Inserts\Facets\Repositories\FacetRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class FacetService
{
    public function __construct(
        public FacetRepository $repository,
//        public InsertStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Facet
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Facet
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