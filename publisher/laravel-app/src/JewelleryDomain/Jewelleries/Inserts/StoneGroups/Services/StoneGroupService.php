<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGroups\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models\StoneGroup;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Repositories\StoneGroupRepository;
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
