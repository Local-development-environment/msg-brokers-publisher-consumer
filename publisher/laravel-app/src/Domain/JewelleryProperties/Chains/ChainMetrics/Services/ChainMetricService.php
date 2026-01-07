<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\ChainMetrics\Services;

use Domain\JewelleryProperties\Chains\ChainMetrics\Models\ChainMetric;
use Domain\JewelleryProperties\Chains\ChainMetrics\Pipelines\ChainMetricPipeline;
use Domain\JewelleryProperties\Chains\ChainMetrics\Repositories\ChainMetricRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class ChainMetricService
{
    public function __construct(
        public ChainMetricRepository $repository,
        public ChainMetricPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): ChainMetric|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): ChainMetric
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
