<?php

declare(strict_types=1);

namespace Domain\Users\VUsers\Services;

use Domain\Users\VUsers\Models\VUser;
use Domain\Users\VUsers\Repositories\VUserRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Throwable;

final class VUserService
{
    public function __construct(
        public VUserRepository $repository,
//        public StoneTypeOriginPipeline $pipeline
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): VUser
    {
//        return $this->pipeline->store($data);
    }

    public function show(array $data, int $id): VUser
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