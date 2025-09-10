<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Services;

use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\NaturalStones\Repositories\NaturalStoneRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class NaturalStoneService
{
    public function __construct(
        public NaturalStoneRepository $repository,
//        public StonePipeline $pipeline
    )
    {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): NaturalStone
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): NaturalStone
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

