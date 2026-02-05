<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Models\TypeOrigin;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Repositories\StoneTypeOriginRepository;
use Throwable;

final class StoneTypeOriginService
{
    public function __construct(
        public StoneTypeOriginRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): TypeOrigin
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): TypeOrigin
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
