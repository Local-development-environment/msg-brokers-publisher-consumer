<?php

namespace Domain\Inserts\Colours\Enums;

enum ColourNameRoutesEnum: string
{
    //    There are a few different colour entities (metal colour, insert colour) so in some cases we must use a
    //    clarifying word - insert or metal before colour.

    case CRUD_INDEX              = 'insert-colours.index';
    case CRUD_SHOW               = 'insert-colours.show';
    case CRUD_POST               = 'insert-colours.post';
    case CRUD_PATCH              = 'insert-colours.patch';
    case CRUD_DELETE             = 'insert-colours.delete';
    case RELATED_TO_INSERT_EXTERIORS      = 'insert-colour.insert-exteriors';
    case RELATIONSHIP_TO_INSERT_EXTERIORS = 'insert-colour.relationships.insert-exteriors';
}
