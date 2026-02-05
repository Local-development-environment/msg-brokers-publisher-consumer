<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Pipelines\Pipes;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\Relationships\BeadBeadMetricsRelationshipRepository;

final class BeadBeadMetricsStoreRelationshipPipe
{
    public function __construct(public BeadBeadMetricsRelationshipRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $items = data_get($data, 'data.relationships.beadMetrics.data');

        $this->repository->store(data_forget($items, '*.type'));

        return $next($data);
    }
}
