<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGrades\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Models\StoneGrade;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Repositories\StoneGradeRepository;
use Throwable;

final class StoneGradeService
{
    public function __construct(
        public StoneGradeRepository $repository,
//        public StoneGradePipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneGrade
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneGrade
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
