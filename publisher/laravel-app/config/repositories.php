<?php

declare(strict_types=1);

use JewelleryDomain\Jewelleries\Inserts\InsertViews\Repositories\VInsertCachedRepositoryInterface;
use JewelleryDomain\Jewelleries\Inserts\InsertViews\Repositories\VInsertRepository;
use JewelleryDomain\Jewelleries\JewelleryViews\Repositories\VJewelleryCachedRepositoryInterface;
use JewelleryDomain\Jewelleries\JewelleryViews\Repositories\VJewelleryRepository;

return [
    [
        'interface'      => VINsertCachedRepositoryInterface::class,
        'implementation' => VInsertRepository::class,
//        'cache'          => VInsertCachedRepository::class
    ],
    [
        'interface'      => VJewelleryCachedRepositoryInterface::class,
        'implementation' => VJewelleryRepository::class,
//        'cache'          => VJewelleryCachedRepository::class
    ],
];
