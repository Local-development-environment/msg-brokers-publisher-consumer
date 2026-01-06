<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BodyParts\Services;

use Domain\JewelleryProperties\Bracelets\BodyParts\Models\BodyPart;
use Domain\JewelleryProperties\Bracelets\BodyParts\Pipelines\BodyPartPipeline;
use Domain\JewelleryProperties\Bracelets\BodyParts\Repositories\BodyPartRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class BodyPartService
{
    public function __construct(
        public BodyPartRepository $repository,
        public BodyPartPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): BodyPart|Model
    {
        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): BodyPart
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
