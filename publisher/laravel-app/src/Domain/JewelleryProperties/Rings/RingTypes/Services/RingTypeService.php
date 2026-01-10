<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingTypes\Services;

use Domain\JewelleryProperties\Rings\RingTypes\Models\RingType;
use Domain\JewelleryProperties\Rings\RingTypes\Pipelines\RingTypePipeline;
use Domain\JewelleryProperties\Rings\RingTypes\Repositories\RingTypeRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class RingTypeService
{
    public function __construct(
        public RingTypeRepository $repository,
        public RingTypePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): RingType
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): RingType
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
