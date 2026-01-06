<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Services;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Jewelleries\Jewelleries\Pipelines\JewelleryPipeline;
use Domain\Jewelleries\Jewelleries\Repositories\JewelleryRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class JewelleryService
{
    public function __construct(
        public JewelleryRepository $repository,
        public JewelleryPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Jewellery
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Jewellery
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
