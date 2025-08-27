<?php

declare(strict_types=1);

namespace Domain\Shared;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

interface CachedRepositoryInterface
{
    public function index(array $data): Paginator;

    public function show(array $data, int $id): Model;
}