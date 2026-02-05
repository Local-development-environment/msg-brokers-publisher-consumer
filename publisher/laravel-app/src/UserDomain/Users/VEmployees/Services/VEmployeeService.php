<?php

declare(strict_types=1);

namespace UserDomain\Users\VEmployees\Services;

use Illuminate\Contracts\Pagination\Paginator;
use UserDomain\Users\VEmployees\Models\VEmployee;
use UserDomain\Users\VEmployees\Repositories\VEmployeeRepository;

final class VEmployeeService
{
    public function __construct(
        public VEmployeeRepository $repository
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    public function show(array $data, int $id): VEmployee
    {
        return $this->repository->show($data, $id);
    }
}
