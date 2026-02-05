<?php

declare(strict_types=1);

namespace UserDomain\Users\VCustomers\Services;

use Illuminate\Contracts\Pagination\Paginator;
use UserDomain\Users\VCustomers\Models\VCustomer;
use UserDomain\Users\VCustomers\Repositories\VCustomerRepository;

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
