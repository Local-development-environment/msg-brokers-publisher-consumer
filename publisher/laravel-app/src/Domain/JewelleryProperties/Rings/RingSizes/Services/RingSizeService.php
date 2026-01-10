<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingSizes\Services;

use Domain\JewelleryProperties\Rings\RingSizes\Models\RingSize;
use Domain\JewelleryProperties\Rings\RingSizes\Pipelines\RingSizePipeline;
use Domain\JewelleryProperties\Rings\RingSizes\Repositories\RingSizeRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class RingSizeService
{
    public function __construct(
        public RingSizeRepository $repository,
        public RingSizePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): RingSize
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): RingSize
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
