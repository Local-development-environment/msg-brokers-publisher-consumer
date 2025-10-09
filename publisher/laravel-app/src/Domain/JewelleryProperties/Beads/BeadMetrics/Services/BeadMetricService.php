<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Services;

use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Beads\BeadMetrics\Pipelines\BeadMetricPipeline;
use Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\BeadMetricRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class BeadMetricService
{
    public function __construct(
        public BeadMetricRepository $repository,
        public BeadMetricPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BeadMetric
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BeadMetric
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