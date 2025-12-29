<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Pendants\Pendants\Services;

use Domain\JewelleryProperties\Pendants\Pendants\Models\Pendant;
use Domain\JewelleryProperties\Pendants\Pendants\Pipelines\PendantPipeline;
use Domain\JewelleryProperties\Pendants\Pendants\Repositories\PendantRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class PendantService
{
    public function __construct(
        public PendantRepository $repository,
        public PendantPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Pendant
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Pendant
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
