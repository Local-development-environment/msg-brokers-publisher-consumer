<?php

declare(strict_types=1);

namespace Domain\Integrations\UVIJewelleries;

use Domain\Integrations\UVIJewelleries\Collections\JewelleryCollection;
use Domain\Integrations\UVIJewelleries\DTO\JewelleryDTO;

interface UVIJewelleryInterface
{
    public function getUVIJewelleries(): JewelleryCollection;

    public function getUVIJewellery(int $id): JewelleryDTO;
}
