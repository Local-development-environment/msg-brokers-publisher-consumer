<?php

declare(strict_types=1);

namespace Domain\Inserts\ImitationStones\Services;

use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Domain\Inserts\ImitationStones\Repositories\ImitationStoneRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class ImitationStoneService
{
    public function __construct(
        public ImitationStoneRepository $repository,
//        public ImitationStonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): ImitationStone
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): ImitationStone
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