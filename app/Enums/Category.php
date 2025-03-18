<?php

namespace App\Enums;

enum Category: int
{
    case FOOD = 1;
    case DAILY_NECESSITIES = 2;
    case EQUIPMENT = 3;
    case OTHERS = 4;

    public function label(): string
    {
        return match ($this) {
            Category::FOOD => '食品',
            category::DAILY_NECESSITIES => '日用品',
            category::EQUIPMENT => '備品',
            category::OTHERS => 'その他',
        };
    }

    // プルダウン用の配列を取得
    public static function options(): array
    {
        return [
            category::FOOD->value => category::FOOD->label(),
            category::DAILY_NECESSITIES->value => category::DAILY_NECESSITIES->label(),
            category::EQUIPMENT->value => category::EQUIPMENT->label(),
            category::OTHERS->value => category::OTHERS->label(),
        ];
    }
}