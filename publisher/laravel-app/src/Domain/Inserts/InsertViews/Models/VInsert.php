<?php

namespace Domain\Inserts\InsertViews\Models;

use Illuminate\Database\Eloquent\Model;

class VInsert extends Model
{
    protected $table = 'jw_views.v_inserts';

    public const string TYPE_RESOURCE = 'VInserts';
}
