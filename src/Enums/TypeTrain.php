<?php

namespace App\Enums;

enum TypeTrain: string
{
    case TGV = 'TGV';
    case TER = 'TER';
    case OUIGO = 'OUIGO';

    public static function getRand(): TypeTrain
    {
        return match (random_int(0, 2)) {
            0 => self::TGV,
            1 => self::TER,
            2 => self::OUIGO,
        };
    }

    public static function getValue(TypeTrain $type): string
    {
        return match ($type) {
            self::TGV => 'TGV',
            self::TER => 'TER',
            self::OUIGO => 'OUIGO',
        };
    }
}
