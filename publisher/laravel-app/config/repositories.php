<?php

declare(strict_types=1);

use Domain\Inserts\InsertViews\Repositories\VInsertCachedRepository;
use Domain\Inserts\InsertViews\Repositories\VInsertCachedRepositoryInterface;
use Domain\Inserts\InsertViews\Repositories\VInsertRepository;
use Domain\Jewelleries\JewelleryViews\Repositories\VJewelleryCachedRepository;
use Domain\Jewelleries\JewelleryViews\Repositories\VJewelleryCachedRepositoryInterface;
use Domain\Jewelleries\JewelleryViews\Repositories\VJewelleryRepository;

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
