<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneMetrics\Services;

use Domain\Inserts\StoneMetrics\Models\StoneMetric;
use Domain\Inserts\StoneMetrics\Repositories\StoneMetricRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class StoneMetricService
{
    public function __construct(
        public StoneMetricRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneMetric
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneMetric
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