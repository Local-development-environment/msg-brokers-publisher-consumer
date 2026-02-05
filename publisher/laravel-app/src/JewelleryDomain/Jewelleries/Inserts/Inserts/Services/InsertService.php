<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Repositories\InsertRepository;
use Throwable;

final class InsertService
{
    public function __construct(
        public InsertRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Insert
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Insert
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
