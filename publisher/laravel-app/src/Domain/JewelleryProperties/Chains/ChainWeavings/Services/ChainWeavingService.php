<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\ChainWeavings\Services;

use Domain\JewelleryProperties\Chains\ChainWeavings\Models\ChainWeaving;
use Domain\JewelleryProperties\Chains\ChainWeavings\Pipelines\ChainWeavingPipeline;
use Domain\JewelleryProperties\Chains\ChainWeavings\Repositories\ChainWeavingRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class ChainWeavingService
{
    public function __construct(
        public ChainWeavingRepository $repository,
        public ChainWeavingPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): ChainWeaving|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): ChainWeaving
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
