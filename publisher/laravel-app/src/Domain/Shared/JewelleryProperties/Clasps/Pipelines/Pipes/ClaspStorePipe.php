<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Pipelines\Pipes;

use Domain\Shared\JewelleryProperties\Clasps\Repositories\ClaspRepository;
use Illuminate\Support\Str;

final class ClaspStorePipe
{
    public function __construct(public ClaspRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        data_set($data, 'data.attributes.slug', Str::slug(data_get($data, 'data.attributes.name')), '-');

        $model = $this->repository->store(data_get($data, 'data.attributes'));

        data_set($data, 'model', $model);
        data_set($data, 'id', $model->id);

        return $next($data);
    }
}