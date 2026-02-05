<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Pipelines\Pipes;

use Illuminate\Support\Str;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Repositories\JewelleryRepository;

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
