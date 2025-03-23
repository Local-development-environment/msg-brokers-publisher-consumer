<?php

declare(strict_types=1);

namespace Domain\Integrations\UVIJewelleries\Services;

use App\Http\Integrations\UVI\UVIConnector;
use Domain\Integrations\UVIJewelleries\Collections\JewelleryCollection;
use Domain\Integrations\UVIJewelleries\DTO\JewelleryDTO;
use Domain\Integrations\UVIJewelleries\UVIJewelleryInterface;
use Saloon\Http\Connector;

final readonly class JewelleryService implements UVIJewelleryInterface
{
    public function getUVIJewelleries(): JewelleryCollection
    {
        // TODO: Implement getUVIJewelleries() method.
    }

    public function getUVIJewellery(int $id): JewelleryDTO
    {
        // TODO: Implement getUVIJewellery() method.
    }

    private function connector(): UVIConnector
    {
        return app(UVIConnector::class);
    }
}
