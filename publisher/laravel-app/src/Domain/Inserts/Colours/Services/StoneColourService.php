<?php

declare(strict_types=1);

namespace Domain\Inserts\Colours\Services;

use Domain\Inserts\Colours\Models\StoneColour;
use Domain\Inserts\Colours\Pipelines\StoneColourPipeline;
use Domain\Inserts\Colours\Repositories\StoneColourRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class StoneColourService
{
    public function __construct(
        public StoneColourRepository $repository,
        public StoneColourPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneColour
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneColour
    {
        return $this->repository->show($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
//        $this->pipeline->update($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
//        $this->pipeline->destroy($id);
    }
}
