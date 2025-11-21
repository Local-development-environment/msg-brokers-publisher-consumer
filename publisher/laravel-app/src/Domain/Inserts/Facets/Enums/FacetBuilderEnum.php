<?php

declare(strict_types=1);

namespace Domain\Inserts\Facets\Enums;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;

enum FacetBuilderEnum: string
{
    case ROUND_CUT     = 'круглая';
    case CUSHION_CUT   = 'кушон';
    case PEAR_CUT      = 'груша';
    case MARQUISE_CUT  = 'маркиз';
    case OVAL_CUT      = 'овальная';
    case RADIANT_CUT   = 'радиант';
    case EMERALD_CUT   = 'изумрудная';
    case PRINCESS_CUT  = 'принцесса';
    case ASSCHER_CUT   = 'ашер';
    case CABOCHON_OVAL = 'кабошон-овал';
    case CABOCHON_ROUND = 'кабошон-круг';
    case HEART_CUT     = 'сердце';
    case TRILLION_CUT  = 'триллион';
    case BRIOLETTE_CUT = 'бриолет';
    case ROSE_CUT      = 'роза';

    public function description(): string
    {
        return match ($this) {
            self::ROUND_CUT    => 'Наиболее универсальная огранка камней и в особенности бриллиантов. Обеспечивает лучший блеск и игру камня, преломление света и внешний вид.',
            self::CUSHION_CUT  => 'Иногда эту огранку ещё называют античной или антик. Как правило, «Кушон» используется тогда, когда необходимо максимально сохранить первоначальный вес минерала. ',
            self::PEAR_CUT     => 'Иногда называется еще капля. Данная огранка объединяет в себе маркиз и овал. Имеет несколько ограниченную сферу применения. Создают внешний эффект утонченности.',
            self::MARQUISE_CUT => 'Овальная форма камня, заостренная с двух краев. Именно с этими краями необходимо быть предельно аккуратным – они достаточно хрупкие.',
            self::OVAL_CUT     => 'Достаточно универсальный вид огранки, который используется в большинстве украшений. Отличается более выраженными переливами света по периметру при взгляде сверху.',
            self::RADIANT_CUT  => 'Мужская огранка камня, которая подчеркивает величественность камня. Требует достаточно больших размеров исходного минерала. Объединяет в себе черты принцессы и изумруда.',
            self::EMERALD_CUT  => 'Применяется для чистейших и крупных камней. При такой огранке очень сложно скрыть какие-либо недостатки камня. В цветовой игре уступает многим другим видам огранки, зато в их яркости – наоборот.',
            self::PRINCESS_CUT => 'Один из самый «играющих» видов огранок, который уступает лишь кругу. Из-за того, что на обработку производственных потерь меньше, чем на огранку круг, принцесса и ценится несколько меньше. Но это не мешает быть лидером в использовании в обручальных кольцах.',
            self::ASSCHER_CUT  => 'Ашер еще называется квадратом из-за того, что это попросту квадратная версия изумруда. С небольшим отличием – несколько больше ярусов и граней.',
            self::HEART_CUT    => 'По технике обработки камня этот способ близок грушевидной огранке. Ради соблюдения баланса красоты линий и прочности соотношение длины и ширины камня после огранки должно составлять 1 : 1.',
            self::TRILLION_CUT => 'Равносторонний треугольник с острыми или закругленными краями. Это сравнительно молодой способ огранки, который был придуман в 80-х годах.',
            self::CABOCHON_OVAL => 'Полированный камень с куполообразным верхом и плоским дном овальной формы.',
            self::CABOCHON_ROUND => 'Полированный камень с куполообразным верхом и плоским дном круглой формы.',
            self::BRIOLETTE_CUT => 'Название огранки переводится с французского как «сушеная слива». Бриолет представляет собой разновидность огранки «роза». Эффектно смотрится в подвесках, но также использовался в диадемах, колье и серьгах.',
            self::ROSE_CUT     => 'Огранки Роза известна еще с 1500-х годов и была популярна до начала 1900-х годов. Форма камня напоминает лепестки бутона розы - отсюда ее название.'
        };
    }

    public function jewelleries(): array
    {
        return match ($this) {
            self::ROUND_CUT => [
                CategoryBuilderEnum::NECKLACES->value,
                CategoryBuilderEnum::EARRINGS->value,
                CategoryBuilderEnum::CHARM_PENDANTS->value,
                CategoryBuilderEnum::PENDANTS->value,
                CategoryBuilderEnum::RINGS->value,
                CategoryBuilderEnum::BROOCHES->value,
                CategoryBuilderEnum::CUFF_LINKS->value,
                CategoryBuilderEnum::TIE_CLIPS->value,
            ],
            self::CUSHION_CUT,
            self::PEAR_CUT,
            self::BRIOLETTE_CUT => [
                CategoryBuilderEnum::NECKLACES->value,
                CategoryBuilderEnum::EARRINGS->value,
                CategoryBuilderEnum::PENDANTS->value,
            ],
            self::MARQUISE_CUT,
            self::RADIANT_CUT,
            self::PRINCESS_CUT => [
                CategoryBuilderEnum::RINGS->value,
                CategoryBuilderEnum::EARRINGS->value,
                CategoryBuilderEnum::PENDANTS->value,
            ],
            self::OVAL_CUT,
            self::EMERALD_CUT => [
                CategoryBuilderEnum::RINGS->value,
                CategoryBuilderEnum::PENDANTS->value,
                CategoryBuilderEnum::EARRINGS->value,
                CategoryBuilderEnum::BRACELETS->value,
                CategoryBuilderEnum::BROOCHES->value,
                CategoryBuilderEnum::NECKLACES->value,
            ],
            self::ASSCHER_CUT => [
                CategoryBuilderEnum::RINGS->value,
                CategoryBuilderEnum::EARRINGS->value,
                CategoryBuilderEnum::BRACELETS->value,
                CategoryBuilderEnum::NECKLACES->value,
            ],
            self::CABOCHON_ROUND,
            self::CABOCHON_OVAL => [
                CategoryBuilderEnum::RINGS->value,
                CategoryBuilderEnum::EARRINGS->value,
                CategoryBuilderEnum::BRACELETS->value,
                CategoryBuilderEnum::BROOCHES->value,
                CategoryBuilderEnum::PENDANTS->value,
            ],
            self::HEART_CUT => [
                CategoryBuilderEnum::RINGS->value,
                CategoryBuilderEnum::PENDANTS->value,
            ],
            self::TRILLION_CUT => [
                CategoryBuilderEnum::RINGS->value,
                CategoryBuilderEnum::EARRINGS->value,
                CategoryBuilderEnum::BROOCHES->value,
            ],
            self::ROSE_CUT => [
                CategoryBuilderEnum::RINGS->value,
                CategoryBuilderEnum::EARRINGS->value,
                CategoryBuilderEnum::BROOCHES->value,
                CategoryBuilderEnum::PENDANTS->value,
            ],
        };
    }
}
