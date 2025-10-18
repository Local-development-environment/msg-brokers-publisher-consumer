<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Services;

use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Domain\JewelleryProperties\Necklaces\Necklaces\Pipelines\NecklacePipeline;
use Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\NecklaceRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class NecklaceService
{
    public function __construct(
        public NecklaceRepository $repository,
        public NecklacePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Necklace
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Necklace
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