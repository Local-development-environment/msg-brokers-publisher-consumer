<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletWeavings\Services;

use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Models\BraceletWeaving;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Pipelines\BraceletWeavingPipeline;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Repositories\BraceletWeavingRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class BraceletWeavingService
{
    public function __construct(
        public BraceletWeavingRepository $repository,
        public BraceletWeavingPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BraceletWeaving|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BraceletWeaving
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
