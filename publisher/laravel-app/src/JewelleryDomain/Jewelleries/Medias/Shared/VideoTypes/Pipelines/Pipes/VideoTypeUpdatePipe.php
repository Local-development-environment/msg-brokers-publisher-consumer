<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Repositories\MediaTypeRepository;

final class VideoTypeUpdatePipe
{
    public function __construct(public MediaTypeRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}
