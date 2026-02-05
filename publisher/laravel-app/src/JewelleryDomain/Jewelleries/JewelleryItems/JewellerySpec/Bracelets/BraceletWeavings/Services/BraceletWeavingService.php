<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Services;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Models\BraceletWeaving;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Pipelines\BraceletWeavingPipeline;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Repositories\BraceletWeavingRepository;
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
