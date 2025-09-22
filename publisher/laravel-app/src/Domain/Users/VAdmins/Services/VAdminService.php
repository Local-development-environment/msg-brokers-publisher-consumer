<?php

declare(strict_types=1);

namespace Domain\Users\VAdmins\Services;

use Domain\Users\VAdmins\Models\VAdmin;
use Domain\Users\VAdmins\Repositories\VAdminRepository;
use Illuminate\Contracts\Pagination\Paginator;

final class VAdminService
{
    public function __construct(
        public VAdminRepository $repository
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    public function show(array $data, int $id): VAdmin
    {
        return $this->repository->show($data, $id);
    }
}