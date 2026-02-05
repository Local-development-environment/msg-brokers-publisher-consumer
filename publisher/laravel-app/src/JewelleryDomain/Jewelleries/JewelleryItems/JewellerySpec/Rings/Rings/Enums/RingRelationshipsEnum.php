<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Enums;

enum RingRelationshipsEnum: string
{
    case JEWELLERY = 'jewellery';
    case RING_FINGER = 'ringFinger';
    case RING_METRICS = 'ringMetrics';
    case RING_DETAILS = 'ringDetails';
    case RING_SIZES = 'ringSizes';
    case RING_TYPES = 'ringTypes';
}
