<?php

namespace Domain\StoneExteriors\StoneCabochonForms\Enums;

enum StoneCabochonFormEnum: string
{
    case TYPE_RESOURCE = 'stoneCabochonForms';
    case TABLE_NAME    = 'jw_stone_exteriors.stone_cabochon_forms';
    case PRIMARY_KEY   = 'id';
}
