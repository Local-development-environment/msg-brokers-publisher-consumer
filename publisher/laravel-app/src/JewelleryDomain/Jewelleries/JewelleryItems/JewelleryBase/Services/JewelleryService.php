<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Pipelines\JewelleryPipeline;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Repositories\JewelleryRepository;
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
        return $this->pipeline->store($data);
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
