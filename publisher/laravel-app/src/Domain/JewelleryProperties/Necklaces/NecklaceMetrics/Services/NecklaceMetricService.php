<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Pipelines\NecklaceMetricPipeline;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Repositories\NecklaceMetricRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class NecklaceMetricService
{
    public function __construct(
        public NecklaceMetricRepository $repository,
        public NecklaceMetricPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): NecklaceMetric
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): NecklaceMetric
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