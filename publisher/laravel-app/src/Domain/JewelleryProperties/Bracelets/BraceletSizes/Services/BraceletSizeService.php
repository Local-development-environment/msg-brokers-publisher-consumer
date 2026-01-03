<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletSizes\Services;

use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Pipelines\BraceletSizePipeline;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Repositories\BraceletSizeRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class BraceletSizeService
{
    public function __construct(
        public BraceletSizeRepository $repository,
        public BraceletSizePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BraceletSize|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BraceletSize
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
