<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Services;

use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Domain\Shared\JewelleryProperties\NeckSizes\Pipelines\NeckSizePipeline;
use Domain\Shared\JewelleryProperties\NeckSizes\Repositories\NeckSizeRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class NeckSizeService
{
    public function __construct(
        public NeckSizeRepository $repository,
        public NeckSizePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): NeckSize
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): NeckSize
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