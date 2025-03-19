<?php

namespace App\Enums;

enum Categories: int
{
    case FOOD = 1;
    case DAILY_NECESSITIES = 2;
    case EQUIPMENT = 3;
    case OTHERS = 4;

    public function label(): string
    {
        return match ($this) {
            Categories::FOOD => '食品',
            Categories::DAILY_NECESSITIES => '日用品',
            Categories::EQUIPMENT => '備品',
            Categories::OTHERS => 'その他',
        };
    }

    // プルダウン用の配列を取得
    public static function options(): array
    {
        return [
            categories::FOOD->value => categories::FOOD->label(),
            Categories::DAILY_NECESSITIES->value => Categories::DAILY_NECESSITIES->label(),
            Categories::EQUIPMENT->value => Categories::EQUIPMENT->label(),
            Categories::OTHERS->value => Categories::OTHERS->label(),
        ];
    }
}