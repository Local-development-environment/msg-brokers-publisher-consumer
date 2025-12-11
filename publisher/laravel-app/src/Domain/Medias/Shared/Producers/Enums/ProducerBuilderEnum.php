<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Enums;

enum ProducerBuilderEnum: string
{
    case MANAGER = 'менеджер';
    case CUSTOMER = 'клиент';

//    public function extension(): string
//    {
//        return match ($this) {
//            self::OGV  => 'ogv',
//            self::WEBM => 'webm',
//            self::MP4  => 'mp4',
//
//        };
//    }
}
