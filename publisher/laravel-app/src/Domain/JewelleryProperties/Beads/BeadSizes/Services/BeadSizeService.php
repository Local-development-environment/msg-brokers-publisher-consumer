<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Services;

use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Domain\JewelleryProperties\Beads\BeadSizes\Pipelines\BeadSizePipeline;
use Domain\JewelleryProperties\Beads\BeadSizes\Repositories\BeadSizeRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class BeadSizeService
{
    public function __construct(
        public BeadSizeRepository $repository,
        public BeadSizePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BeadSize
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BeadSize
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