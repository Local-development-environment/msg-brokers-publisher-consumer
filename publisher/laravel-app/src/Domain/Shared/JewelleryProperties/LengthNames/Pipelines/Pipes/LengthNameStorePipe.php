<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Pipelines\Pipes;

use Domain\Shared\JewelleryProperties\LengthNames\Repositories\LengthNameRepository;

final class LengthNameStorePipe
{
    public function __construct(public LengthNameRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $model = $this->repository->store(data_get($data, 'data.attributes'));

        data_set($data, 'model', $model);
        data_set($data, 'id', $model->id);

        return $next($data);
    }
}