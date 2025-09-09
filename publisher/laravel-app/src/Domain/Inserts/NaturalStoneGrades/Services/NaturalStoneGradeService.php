<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStoneGrades\Services;

use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Domain\Inserts\NaturalStoneGrades\Repositories\NaturalStoneGradeRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class NaturalStoneGradeService
{
    public function __construct(
        public NaturalStoneGradeRepository $repository,
//        public NaturalStoneGradePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): NaturalStoneGrade
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): NaturalStoneGrade
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