<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletBases\Services;

use Domain\JewelleryProperties\Bracelets\BraceletBases\Models\BraceletBase;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Pipelines\BraceletBasePipeline;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Repositories\BraceletBaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class BraceletBaseService
{
    public function __construct(
        public BraceletBaseRepository $repository,
        public BraceletBasePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BraceletBase|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BraceletBase
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
