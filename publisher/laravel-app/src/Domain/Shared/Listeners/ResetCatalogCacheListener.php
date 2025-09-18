<?php

namespace Domain\Shared\Listeners;

use Domain\Shared\Events\CatalogUpdatedEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ResetCatalogCacheListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CatalogUpdatedEvent $event): void
    {
        $info = $event->model->getTable();

        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_inserts;');
        DB::statement('REFRESH MATERIALIZED VIEW jw_views.v_jewelleries;');

        Log::info("jw_views.v_jewelleries was updated after updated $info table");
    }
}
