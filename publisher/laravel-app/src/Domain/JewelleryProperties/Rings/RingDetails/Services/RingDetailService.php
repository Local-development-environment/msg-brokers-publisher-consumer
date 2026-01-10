<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingDetails\Services;

use Domain\JewelleryProperties\Rings\RingDetails\Models\RingDetail;
use Domain\JewelleryProperties\Rings\RingDetails\Pipelines\RingDetailPipeline;
use Domain\JewelleryProperties\Rings\RingDetails\Repositories\RingDetailRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class RingDetailService
{
    public function __construct(
        public RingDetailRepository $repository,
        public RingDetailPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): RingDetail
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): RingDetail
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
