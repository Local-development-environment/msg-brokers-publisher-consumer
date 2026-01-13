<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\TieClips\TieClips\Enums;

enum TieClipNameRoutesEnum: string
{
    case CRUD_INDEX                = 'tie-clips.index';
    case CRUD_SHOW                 = 'tie-clips.show';
    case CRUD_POST                 = 'tie-clips.post';
    case CRUD_PATCH                = 'tie-clips.patch';
    case CRUD_DELETE               = 'tie-clips.delete';
    case RELATED_TO_JEWELLERY      = 'tie-clip.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'tie-clip.relationships.jewellery';
}
