<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryCategories\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryCategories\Models\JewelleryCategory;
use JewelleryDomain\Jewelleries\JewelleryCategories\Pipelines\JewelleryCategoryPipeline;
use JewelleryDomain\Jewelleries\JewelleryCategories\Repositories\JewelleryCategoryRepository;
use Throwable;

final class JewelleryCategoryService
{
    public function __construct(
        public JewelleryCategoryRepository $repository,
        public JewelleryCategoryPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): JewelleryCategory
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): JewelleryCategory
    {
        return $this->repository->show($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function update(array $data, int $id): void
    {
//        $this->pipeline->update($data, $id);
    }

    /**
     * @throws Throwable
     */
    public function destroy(int $id): void
    {
//        $this->pipeline->destroy($id);
    }
}
