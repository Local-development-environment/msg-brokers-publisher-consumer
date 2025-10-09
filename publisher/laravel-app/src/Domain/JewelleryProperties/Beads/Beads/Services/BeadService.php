<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Services;

use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\JewelleryProperties\Beads\Beads\Pipelines\BeadPipeline;
use Domain\JewelleryProperties\Beads\Beads\Repositories\BeadRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class BeadService
{
    public function __construct(
        public BeadRepository $repository,
        public BeadPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Bead
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Bead
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