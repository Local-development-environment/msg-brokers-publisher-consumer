<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Piercings\Piercings\Services;

use Domain\JewelleryProperties\Piercings\Piercings\Models\Piercing;
use Domain\JewelleryProperties\Piercings\Piercings\Pipelines\PiercingPipeline;
use Domain\JewelleryProperties\Piercings\Piercings\Repositories\PiercingRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class PiercingService
{
    public function __construct(
        public PiercingRepository $repository,
        public PiercingPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Piercing
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Piercing
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