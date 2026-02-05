<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Models\MediaType;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Pipelines\MediaTypePipeline;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Repositories\MediaTypeRepository;
use Throwable;

final class MediaTypeService
{
    public function __construct(
        public MediaTypeRepository $repository,
        public MediaTypePipeline   $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): MediaType
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): MediaType
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
