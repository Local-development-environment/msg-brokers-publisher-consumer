<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Services;

use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Domain\Shared\JewelleryProperties\Clasps\Pipelines\ClaspPipeline;
use Domain\Shared\JewelleryProperties\Clasps\Repositories\ClaspRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class ClaspService
{
    public function __construct(
        public ClaspRepository $repository,
        public ClaspPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Clasp
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Clasp
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