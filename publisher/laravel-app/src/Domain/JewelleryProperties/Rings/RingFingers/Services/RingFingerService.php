<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingFingers\Services;

use Domain\JewelleryProperties\Rings\RingFingers\Models\RingFinger;
use Domain\JewelleryProperties\Rings\RingFingers\Pipelines\RingFingerPipeline;
use Domain\JewelleryProperties\Rings\RingFingers\Repositories\RingFingerRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class RingFingerService
{
    public function __construct(
        public RingFingerRepository $repository,
        public RingFingerPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): RingFinger
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): RingFinger
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
