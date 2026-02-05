<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryViews\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface VJewelleryCachedRepositoryInterface
{
    public function index(array $params): Collection;

    public function show(array $params, int $id): Model;
}
