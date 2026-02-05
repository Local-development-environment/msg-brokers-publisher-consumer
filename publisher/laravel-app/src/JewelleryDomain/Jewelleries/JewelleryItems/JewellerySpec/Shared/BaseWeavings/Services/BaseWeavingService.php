<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Services;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Models\BaseWeaving;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Pipelines\BaseWeavingPipeline;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Repositories\BaseWeavingRepository;
use Throwable;

final class BaseWeavingService
{
    public function __construct(
        public BaseWeavingRepository $repository,
        public BaseWeavingPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BaseWeaving|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BaseWeaving
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
