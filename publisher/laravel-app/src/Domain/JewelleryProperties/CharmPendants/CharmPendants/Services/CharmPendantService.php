<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\CharmPendants\CharmPendants\Services;

use Domain\JewelleryProperties\CharmPendants\CharmPendants\Models\CharmPendant;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Pipelines\CharmPendantPipeline;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Repositories\CharmPendantRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class CharmPendantService
{
    public function __construct(
        public CharmPendantRepository $repository,
        public CharmPendantPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): CharmPendant
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): CharmPendant
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
