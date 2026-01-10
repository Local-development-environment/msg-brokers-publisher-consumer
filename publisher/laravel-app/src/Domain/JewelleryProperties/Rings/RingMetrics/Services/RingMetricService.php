<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingMetrics\Services;

use Domain\JewelleryProperties\Rings\RingMetrics\Models\RingMetric;
use Domain\JewelleryProperties\Rings\RingMetrics\Pipelines\RingMetricPipeline;
use Domain\JewelleryProperties\Rings\RingMetrics\Repositories\RingMetricRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class RingMetricService
{
    public function __construct(
        public RingMetricRepository $repository,
        public RingMetricPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): RingMetric
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): RingMetric
    {
        return $this->repository->show($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
        $this->pipeline->update($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
        $this->pipeline->destroy($id);
    }
}
