<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Services;

use Domain\Medias\Shared\Producers\Models\Producer;
use Domain\Medias\Shared\Producers\Pipelines\ProducerPipeline;
use Domain\Medias\Shared\Producers\Repositories\ProducerRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class ProducerService
{
    public function __construct(
        public ProducerRepository $repository,
        public ProducerPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Producer
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Producer
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