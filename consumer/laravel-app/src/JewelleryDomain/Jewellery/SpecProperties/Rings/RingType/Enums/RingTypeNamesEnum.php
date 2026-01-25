<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\Rings\RingType\Enums;

enum RingTypeNamesEnum: string
{
    case CLASSIC      = 'классическое';
    case PHALANX      = 'на фалангу';
    case KNUCKLE      = 'кастет';
    case MASSIVE_RING = 'перстень';
    case SIGNET_RING  = 'печатка';
    case SET_RING     = 'наборное';

    /**
     * @return string
     */
    public function description(): string
    {
        return match ($this) {
            self::CLASSIC      => 'Классическое кольцо носится на одном пальце руки, не имеет признаков печатки и перстня, может выступать в роли помолвочного',
            self::PHALANX      => 'Кольца на любую фалангу пальца или даже на несколько, покрывая ее полностью',
            self::KNUCKLE      => 'Кольца на несколько пальцев, соединенные между собой',
            self::MASSIVE_RING => 'Перстень – это старинный тип кольца. Свое название это кольцо получило от устаревшего слова «перст», что означает «палец». Дизайн перстней довольно строгий. Основной акцент в этом типе колец сделан на драгоценный камень.',
            self::SIGNET_RING  => 'Этот тип колец – наследие прошедших времен. Кольцо-печать украшал семейный герб или инициалы владельца, и использовалась такая печать по прямому назначению – заверять документы. Сегодня кольца-печати несут декоративный смысл. В основном такие кольца изготавливают для мужчин.',
            self::SET_RING     => 'Кольца этого типа делают тонкими и разного дизайна. Их можно носить как каждое по отдельности, так и составлять из них оригинальные композиции для каждого случая.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::CLASSIC      => 40,
            self::PHALANX      => 5,
            self::KNUCKLE      => 5,
            self::MASSIVE_RING => 2,
            self::SIGNET_RING  => 10,
            self::SET_RING     => 5,
        };
    }
}
