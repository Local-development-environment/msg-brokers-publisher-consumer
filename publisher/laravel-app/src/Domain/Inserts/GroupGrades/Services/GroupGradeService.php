<?php

declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Services;

use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Domain\Inserts\GroupGrades\Pipelines\GroupGradePipeline;
use Domain\Inserts\GroupGrades\Repositories\GroupGradeRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class GroupGradeService
{
    public function __construct(
        public GroupGradeRepository $repository,
        public GroupGradePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): GroupGrade
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): GroupGrade
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
