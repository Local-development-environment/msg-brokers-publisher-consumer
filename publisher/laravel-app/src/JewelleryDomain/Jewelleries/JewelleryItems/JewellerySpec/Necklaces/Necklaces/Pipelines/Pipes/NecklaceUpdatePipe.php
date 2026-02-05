<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Repositories\NecklaceRepository;

final class NecklaceUpdatePipe
{
    public function __construct(public NecklaceRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}
