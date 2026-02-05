<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Pipelines\CatalogMediaPipeline;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Repositories\CatalogMediaRepository;
use Throwable;

final class CatalogMediaService
{
    public function __construct(
        public CatalogMediaRepository $repository,
        public CatalogMediaPipeline   $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): CatalogMedia
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): CatalogMedia
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
