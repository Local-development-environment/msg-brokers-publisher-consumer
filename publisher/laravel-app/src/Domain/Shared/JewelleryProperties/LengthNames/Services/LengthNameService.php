<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Services;

use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Domain\Shared\JewelleryProperties\LengthNames\Pipelines\LengthNamePipeline;
use Domain\Shared\JewelleryProperties\LengthNames\Repositories\LengthNameRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class LengthNameService
{
    public function __construct(
        public LengthNameRepository $repository,
        public LengthNamePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): LengthName
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): LengthName
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