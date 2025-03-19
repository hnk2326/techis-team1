<?php

namespace App\Enums;

enum Enum: int
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
            Categories::FOOD->value => Categories::FOOD->label(),
            Category::DAILY_NECESSITIES->value => Category::DAILY_NECESSITIES->label(),
            Category::EQUIPMENT->value => Category::EQUIPMENT->label(),
            Category::OTHERS->value => Category::OTHERS->label(),
        ];
    }
}