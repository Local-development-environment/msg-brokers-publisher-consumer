<?php

namespace JewelleryDomain\Jewellery\InsertItems\StoneTreatment\Enums;

use JewelleryDomain\Jewellery\InsertItems\StoneForm\Enums\StoneFormNamesEnum;

enum StoneTreatmentNamesEnum: string
{
    case FACETING = 'ограненный';
    case CABOCHON = 'кабашон';

    public function description(): string
    {
        return match ($this) {
            self::FACETING => 'Огранка — это технологический процесс обработки драгоценных и полудрагоценных камней путем нанесения на их поверхность геометрически правильных плоскостей (граней) для придания определенной формы, устранения природных дефектов, а также максимального раскрытия игры света, блеска и цвета. ',
            self::CABOCHON => 'Кабошон (от фр. caboche — голова) — это способ обработки драгоценных, полудрагоценных и поделочных камней, при котором минерал приобретает гладкую, выпуклую, отполированную поверхность без граней.',
        };
    }
}
