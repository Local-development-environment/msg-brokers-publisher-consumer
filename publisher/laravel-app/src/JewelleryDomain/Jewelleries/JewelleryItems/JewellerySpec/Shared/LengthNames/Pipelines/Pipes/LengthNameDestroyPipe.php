<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Repositories\LengthNameRepository;

final class LengthNameDestroyPipe
{
    public function __construct(public LengthNameRepository $repository)
    {
    }

    public function handle(int $id, \Closure $next): mixed
    {
        $this->repository->destroy($id);

        return $next($id);
    }
}
