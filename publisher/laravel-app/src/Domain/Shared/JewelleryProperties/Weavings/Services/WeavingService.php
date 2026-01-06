<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Weavings\Services;

use Domain\Shared\JewelleryProperties\Weavings\Models\Weaving;
use Domain\Shared\JewelleryProperties\Weavings\Pipelines\WeavingPipeline;
use Domain\Shared\JewelleryProperties\Weavings\Repositories\WeavingRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class WeavingService
{
    public function __construct(
        public WeavingRepository $repository,
        public WeavingPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Weaving
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Weaving
    {
        return $this->repository->show($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
//        $this->pipeline->update($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
//        $this->pipeline->destroy($id);
    }
}
