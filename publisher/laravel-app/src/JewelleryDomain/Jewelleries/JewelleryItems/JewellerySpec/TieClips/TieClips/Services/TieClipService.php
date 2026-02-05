<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Models\TieClip;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Pipelines\TieClipPipeline;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Repositories\TieClipRepository;
use Throwable;

final class TieClipService
{
    public function __construct(
        public TieClipRepository $repository,
        public TieClipPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): TieClip
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): TieClip
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
