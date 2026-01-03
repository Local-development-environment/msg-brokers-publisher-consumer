<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletMetrics\Services;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models\BraceletMetric;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Pipelines\BraceletMetricPipeline;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Repositories\BraceletMetricRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class BraceletMetricService
{
    public function __construct(
        public BraceletMetricRepository $repository,
        public BraceletMetricPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BraceletMetric|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BraceletMetric
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
