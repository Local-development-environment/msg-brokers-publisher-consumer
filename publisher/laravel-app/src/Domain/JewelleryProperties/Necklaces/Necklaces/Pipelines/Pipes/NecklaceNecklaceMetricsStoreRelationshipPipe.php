<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Pipelines\Pipes;

use Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships\NecklaceNecklaceMetricsRelationshipRepository;

final class NecklaceNecklaceMetricsStoreRelationshipPipe
{
    public function __construct(public NecklaceNecklaceMetricsRelationshipRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        $items = data_get($data, 'data.relationships.necklaceMetrics.data');

        $this->repository->store(data_forget($items, '*.type'));

        return $next($data);
    }
}