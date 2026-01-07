<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\BaseWeavings\Services;

use Domain\Shared\JewelleryProperties\BaseWeavings\Models\BaseWeaving;
use Domain\Shared\JewelleryProperties\BaseWeavings\Pipelines\BaseWeavingPipeline;
use Domain\Shared\JewelleryProperties\BaseWeavings\Repositories\BaseWeavingRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
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
