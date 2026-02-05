<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneColours\Services;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Models\StoneColour;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Pipelines\StoneColourPipeline;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Repositories\StoneColourRepository;
use Throwable;

final class StoneColourService
{
    public function __construct(
        public StoneColourRepository $repository,
        public StoneColourPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): StoneColour
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): StoneColour
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
