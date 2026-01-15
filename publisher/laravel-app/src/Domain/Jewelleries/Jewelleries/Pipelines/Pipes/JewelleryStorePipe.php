<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Pipelines\Pipes;

use Domain\Jewelleries\Jewelleries\Repositories\JewelleryRepository;
use Illuminate\Support\Str;

final class JewelleryStorePipe
{
    public function __construct(public JewelleryRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        data_set($data, 'data.attributes.id', data_get($data, 'data.id'));
        data_set($data, 'data.attributes.slug', Str::slug(data_get($data, 'data.attributes.name'),'-'));

        $model = $this->repository->store(data_get($data, 'data.attributes'));

        data_set($data, 'model', $model);
        data_set($data, 'id', $model->id);

        return $next($data);
    }
}
