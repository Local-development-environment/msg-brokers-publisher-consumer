<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Weavings\Enums;

enum WeavingRelationshipsEnum: string
{
    case BASE_WEAVING = 'baseWeaving';
    case CHAIN_WEAVINGS = 'chainWeavings';
    case BRACELET_WEAVINGS = 'braceletWeavings';
}
