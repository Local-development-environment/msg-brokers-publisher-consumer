<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Services;

use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Domain\JewelleryProperties\Beads\BeadBases\Pipelines\BeadBasePipeline;
use Domain\JewelleryProperties\Beads\BeadBases\Repositories\BeadBaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class BeadBaseService
{
    public function __construct(
        public BeadBaseRepository $repository,
        public BeadBasePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BeadBase
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BeadBase
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