<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Repositories\BroochRepository;

final class BroochUpdatePipe
{
    public function __construct(public BroochRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}
