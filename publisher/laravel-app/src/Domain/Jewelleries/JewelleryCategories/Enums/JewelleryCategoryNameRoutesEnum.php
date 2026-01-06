<?php
declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryCategories\Enums;

enum JewelleryCategoryNameRoutesEnum: string
{
    //    It Can be a few different category entities in future so in some cases we must use a
    //    clarifying word - jewellery before category.

    case CRUD_INDEX                  = 'jewellery-category.index';
    case CRUD_SHOW                   = 'jewellery-category.show';
    case CRUD_POST                   = 'jewellery-category.post';
    case CRUD_PATCH                  = 'jewellery-category.patch';
    case CRUD_DELETE                 = 'jewellery-category.delete';
    case RELATED_TO_JEWELLERIES      = 'jewellery-category.jewelleries';
    case RELATIONSHIP_TO_JEWELLERIES = 'jewellery-category.relationships.jewelleries';
}
