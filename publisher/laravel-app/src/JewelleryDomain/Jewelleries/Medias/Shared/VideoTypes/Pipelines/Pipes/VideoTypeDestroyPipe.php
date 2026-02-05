<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Repositories\VideoTypeRepository;

final class VideoTypeDestroyPipe
{
    public function __construct(public VideoTypeRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}
