<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


/**
 * Undocumented class
 */
/**
 * 開発用のダミーデータを作成します
 * 参考：https://taraoblog.com/laravel-seeder/
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('adminpass')
            ],
            [
                'name' => 'member',
                'email' => 'member@example.com',
                'password' => Hash::make('memberpass')
            ],
            [
                'name' => 'creator',
                'email' => 'creator@example.com',
                'password' => Hash::make('creatorpass')
            ]
        ]);
    }
}
