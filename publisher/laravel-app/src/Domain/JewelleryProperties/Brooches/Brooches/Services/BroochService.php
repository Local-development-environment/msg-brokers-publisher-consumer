<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Brooches\Brooches\Services;

use Domain\JewelleryProperties\Brooches\Brooches\Models\Brooch;
use Domain\JewelleryProperties\Brooches\Brooches\Pipelines\BroochPipeline;
use Domain\JewelleryProperties\Brooches\Brooches\Repositories\BroochRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class BroochService
{
    public function __construct(
        public BroochRepository $repository,
        public BroochPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): Brooch
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): Brooch
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