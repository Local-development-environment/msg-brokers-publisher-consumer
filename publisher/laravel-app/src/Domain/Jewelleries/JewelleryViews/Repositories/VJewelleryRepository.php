<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Shared\CachedRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

final class VJewelleryRepository implements CachedRepositoryInterface
{

    public function index(array $data): Paginator
    {
        // TODO: Implement index() method.
    }

    public function show(array $data, int $id): VJewellery
    {
        // TODO: Implement show() method.
    }
}