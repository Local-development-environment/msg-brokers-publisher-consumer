<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\Rings\Services;

use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Domain\JewelleryProperties\Rings\Rings\Pipelines\RingPipeline;
use Domain\JewelleryProperties\Rings\Rings\Repositories\RingRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class RingService
{
    public function __construct(
        public RingRepository $repository,
        public RingPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Ring
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Ring
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
