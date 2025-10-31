<?php

declare(strict_types=1);

namespace Domain\Inserts\Colours\Services;

use Domain\Inserts\Colours\Models\Colour;
use Domain\Inserts\Colours\Repositories\ColourRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class ColourService
{
    public function __construct(
        public ColourRepository $repository,
//        public InsertStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Colour
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Colour
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