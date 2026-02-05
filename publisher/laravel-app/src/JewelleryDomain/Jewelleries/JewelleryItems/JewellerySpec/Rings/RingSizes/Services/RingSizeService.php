<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Models\RingSize;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Pipelines\RingSizePipeline;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Repositories\RingSizeRepository;
use Throwable;

final class RingSizeService
{
    public function __construct(
        public RingSizeRepository $repository,
        public RingSizePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): RingSize
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): RingSize
    {
        return $this->repository->show($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
        $this->pipeline->update($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
        $this->pipeline->destroy($id);
    }
}
