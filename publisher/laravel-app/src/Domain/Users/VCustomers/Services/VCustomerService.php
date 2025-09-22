<?php

declare(strict_types=1);

namespace Domain\Users\VCustomers\Services;

use Domain\Users\VCustomers\Models\VCustomer;
use Domain\Users\VCustomers\Repositories\VCustomerRepository;
use Illuminate\Contracts\Pagination\Paginator;

final class VCustomerService
{
    public function __construct(
        public VCustomerRepository $repository
    ) {}

    public function index(array $data): Paginator
    {
        return $this->repository->index($data);
    }

    public function show(array $data, int $id): VCustomer
    {
        return $this->repository->show($data, $id);
    }
}