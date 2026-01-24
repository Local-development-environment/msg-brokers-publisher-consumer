<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\Rings\RingSize\Enums;

enum RingSizeValuesEnum: string
{
    case RING_15   = '15';
    case RING_15_5 = '15.5';
    case RING_16   = '16';
    case RING_16_5 = '16.5';
    case RING_17   = '17';
    case RING_17_5 = '17.5';
    case RING_18   = '18';
    case RING_18_5 = '18.5';
    case RING_19   = '19';
    case RING_19_5 = '19.5';
    case RING_20   = '20';
    case RING_20_5 = '20.5';
    case RING_21   = '21';
    case RING_21_5 = '21.5';
    case RING_22   = '22';

    public function unitMeasurement(): string
    {
        return 'мм';
    }
}
