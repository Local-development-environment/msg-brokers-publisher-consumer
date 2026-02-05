<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochTypes\Enums;

enum BroochTypeBuilderEnum: string
{
    case SAFETY_PIN  = 'английская булавка';
    case FIBULA      = 'фибула';
    case BADGE       = 'значок';
    case CHATELAINE  = 'шателен';
    case BOUTONNIERE = 'бутоньерка';
    case CAMEO       = 'камея';
    case INTAGLIO    = 'инталия';
    case CORSAGE     = 'корсажная';
    case DRESS_CLIP  = 'дресс-клип';
    case SAVIGNY     = 'севинье';

    public function description(): string
    {
        return match ($this) {
            self::SAFETY_PIN  => '',
            self::FIBULA      => 'Фибулы – это виды украшений из металла, в виде изогнутого полумесяца, с острой иглой, прикрепленной на ушке, были распространены с бронзового века до раннего Средневековья.',
            self::BADGE       => 'Значок – это изделие в виде небольшой пластины с рисунком. Значки могут быть атрибутами принадлежности к сообществу, событию или месту.',
            self::CHATELAINE  => 'Пара брошей, соединенная цепочками разной длины, называется брошь-шатлен. Шатленом также считается одинокая брошь, к которой прикреплены одна или несколько цепочек.',
            self::BOUTONNIERE => 'Брошь на мужской пиджак называется бутоньерка. ',
            self::CAMEO       => 'Украшение с выпуклым изображением профиля женщины называется камея.',
            self::INTAGLIO    => 'Украшение с утопленным изображением',
            self::CORSAGE     => 'Корсажная брошь – это изделие, похожее на маленькую копию многоуровневой люстры. Носятся обычно посреди выреза декольте или на левой стороне.',
            self::DRESS_CLIP  => 'Эти изделия представляют собой обычные клипсы, или украшения, дополненные в конструкции острой иглой.',
            self::SAVIGNY     => 'Красивое название севинье представляет собой брошку, которая по форме напоминает бант.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::SAFETY_PIN  => 20,
            self::FIBULA      => 5,
            self::BADGE       => 5,
            self::CHATELAINE  => 10,
            self::BOUTONNIERE => 5,
            self::CAMEO       => 10,
            self::INTAGLIO    => 10,
            self::CORSAGE     => 15,
            self::DRESS_CLIP  => 5,
            self::SAVIGNY     => 15,
        };
    }
}
