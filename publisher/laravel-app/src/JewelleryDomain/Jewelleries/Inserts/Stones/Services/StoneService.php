<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\StoneRepository;
use Throwable;

final class StoneService
{
    public function __construct(
        public StoneRepository $repository,
//        public StonePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Stone
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Stone
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
