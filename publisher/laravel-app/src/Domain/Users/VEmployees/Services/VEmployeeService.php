<?php

declare(strict_types=1);

namespace Domain\Users\VEmployees\Services;

use Domain\Users\VEmployees\Models\VEmployee;
use Domain\Users\VEmployees\Repositories\VEmployeeRepository;
use Illuminate\Contracts\Pagination\Paginator;

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