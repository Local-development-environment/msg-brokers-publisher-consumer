<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletTypes\Services;

use Domain\JewelleryProperties\Bracelets\BraceletTypes\Models\BraceletType;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Pipelines\BraceletTypePipeline;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Repositories\BraceletTypeRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class BraceletTypeService
{
    public function __construct(
        public BraceletTypeRepository $repository,
        public BraceletTypePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BraceletType|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BraceletType
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
