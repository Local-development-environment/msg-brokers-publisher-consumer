<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertMetrics\Services;

use Domain\Inserts\InsertMetrics\Models\InsertMetric;
use Domain\Inserts\InsertMetrics\Repositories\InsertMetricRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class InsertMetricService
{
    public function __construct(
        public InsertMetricRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): InsertMetric
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): InsertMetric
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