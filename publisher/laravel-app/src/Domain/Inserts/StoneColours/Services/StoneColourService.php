<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneColours\Services;

use Domain\Inserts\StoneColours\Models\StoneColour;
use Domain\Inserts\StoneColours\Repositories\StoneColourRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class StoneColourService
{
    public function __construct(
        public StoneColourRepository $repository,
//        public InsertStonePipeline $pipeline
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