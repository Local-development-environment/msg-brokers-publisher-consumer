<?php

namespace Domain\Inserts\Colours\Enums;

enum StoneColourNameRoutesEnum: string
{
    //    There are a few different colour entities (metal colour, insert colour) so in some cases we must use a
    //    clarifying word - insert or metal before colour.

    case CRUD_INDEX              = 'stone-colours.index';
    case CRUD_SHOW               = 'stone-colours.show';
    case CRUD_POST               = 'stone-colours.post';
    case CRUD_PATCH              = 'stone-colours.patch';
    case CRUD_DELETE             = 'stone-colours.delete';
    case RELATED_TO_STONE_EXTERIORS      = 'stone-colour.stone-exteriors';
    case RELATIONSHIP_TO_STONE_EXTERIORS = 'stone-colour.relationships.stone-exteriors';
}
