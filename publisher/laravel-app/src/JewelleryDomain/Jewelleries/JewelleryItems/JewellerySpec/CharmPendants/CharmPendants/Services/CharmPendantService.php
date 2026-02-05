<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Models\CharmPendant;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Pipelines\CharmPendantPipeline;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Repositories\CharmPendantRepository;
use Throwable;

final class CharmPendantService
{
    public function __construct(
        public CharmPendantRepository $repository,
        public CharmPendantPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): CharmPendant
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): CharmPendant
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
