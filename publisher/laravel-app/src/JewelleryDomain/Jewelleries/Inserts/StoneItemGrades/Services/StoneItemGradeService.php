<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Models\StoneItemGrade;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Pipelines\StoneItemGradePipeline;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Repositories\StoneItemGradeRepository;
use Throwable;

final class StoneItemGradeService
{
    public function __construct(
        public StoneItemGradeRepository $repository,
        public StoneItemGradePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneItemGrade
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneItemGrade
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
