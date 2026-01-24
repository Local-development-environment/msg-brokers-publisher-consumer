<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter\DataValidators;

use Illuminate\Support\Facades\Validator;

final readonly class JewelleryCategoryValidator
{
    public function __construct(private string $category)
    {
    }

    public function jewelleryCategoryValidation(): void
    {
        $validator = Validator::make(
            data: [
                'category' => $this->category,
            ],
            rules: [
                'category' => [
                    'required', 'string', 'exists:pgsql_pub.jewelleries.jewellery_categories,name'
                ],
            ]
        );

        dump($validator->validated());
    }
}
