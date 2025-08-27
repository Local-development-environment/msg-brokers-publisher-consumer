<?php

declare(strict_types=1);

use Domain\Inserts\InsertViews\Repositories\VInsertRepository;
use Domain\Inserts\InsertViews\Repositories\VInsertCachedRepository;
use Domain\Jewelleries\JewelleryViews\Repositories\VJewelleryCachedRepository;
use Domain\Jewelleries\JewelleryViews\Repositories\VJewelleryRepository;
use Domain\Shared\CachedRepositoryInterface;

return [
    [
        'interface'      => CachedRepositoryInterface::class,
        'implementation' => VInsertRepository::class,
        'cache'          => VInsertCachedRepository::class
    ],
//    [
//        'interface'      => CachedRepositoryInterface::class,
//        'implementation' => VJewelleryRepository::class,
//        'cache'          => VJewelleryCachedRepository::class
//    ],
];
