<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryCategories\Services;

use Domain\Jewelleries\JewelleryCategories\Models\JewelleryCategory;
use Domain\Jewelleries\JewelleryCategories\Pipelines\JewelleryCategoryPipeline;
use Domain\Jewelleries\JewelleryCategories\Repositories\JewelleryCategoryRepository;
use Illuminate\Contracts\Pagination\Paginator;
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
