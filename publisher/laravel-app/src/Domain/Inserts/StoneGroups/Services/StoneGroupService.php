<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGroups\Services;

use Domain\Inserts\StoneGroups\Models\StoneGroup;
use Domain\Inserts\StoneGroups\Repositories\StoneGroupRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class StoneGroupService
{
    public function __construct(
        public StoneGroupRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneGroup
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneGroup
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