<?php

declare(strict_types=1);

namespace UserDomain\Users\VAdmins\Services;

use Illuminate\Contracts\Pagination\Paginator;
use UserDomain\Users\VAdmins\Models\VAdmin;
use UserDomain\Users\VAdmins\Repositories\VAdminRepository;

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
