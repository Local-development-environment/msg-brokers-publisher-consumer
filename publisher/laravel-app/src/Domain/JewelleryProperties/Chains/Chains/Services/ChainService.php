<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Services;

use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\JewelleryProperties\Chains\Chains\Pipelines\ChainPipeline;
use Domain\JewelleryProperties\Chains\Chains\Repositories\ChainRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class ChainService
{
    public function __construct(
        public ChainRepository $repository,
        public ChainPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Chain
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Chain
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