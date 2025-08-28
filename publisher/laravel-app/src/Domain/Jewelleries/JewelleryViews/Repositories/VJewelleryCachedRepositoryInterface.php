<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

interface VJewelleryCachedRepositoryInterface
{
    public function index(array $data): Paginator;

    public function show(array $data, int $id): Model;
}