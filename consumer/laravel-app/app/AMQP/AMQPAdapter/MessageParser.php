<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter;

use App\AMQP\AMQPAdapter\DataValidators\CoverageValidator;
use App\AMQP\AMQPAdapter\DataValidators\InsertItemValidator;
use App\AMQP\AMQPAdapter\DataValidators\JewelleryCategoryValidator;
use App\AMQP\AMQPAdapter\DataValidators\JewelleryValidator;
use App\AMQP\AMQPAdapter\DataValidators\PreciousMetalValidator;
use App\AMQP\AMQPAdapter\DataValidators\SpecPropertyValidator;

final class MessageParser
{
    public function __construct(public array $messages)
    {
    }

    public function parser(): void
    {
        $data = $this->messages;

        $category = data_get($data, 'category');
        $jewellery = data_get($data, 'jewelleryItem');
        $metal = data_get($data, 'preciousMetals');
        $coverages = data_get($data, 'coverages');
        $insertItem = data_get($data, 'insertItem');
        $specProperty = data_get($data, 'property');
        dump($data);
        (new JewelleryCategoryValidator($category))->jewelleryCategoryValidation();
        (new JewelleryValidator($jewellery))->jewelleryValidation();
        (new PreciousMetalValidator($metal))->preciousMetalValidation();
        (new CoverageValidator($coverages))->coverageValidation();
        (new InsertItemValidator($insertItem))->insertItemValidation();
        (new SpecPropertyValidator($specProperty))->specPropertyValidation();
    }
}
