<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // IDをリセットしてからダミーデータを作成
        // DB::table('items')->truncate(); 

        // array_rand($userIds) で ランダムな id を選択users 
        // User::pluck('id')->toArray() で すべての id を配列で取得

        $userIds = User::pluck('id')->toArray(); // users テーブルの全 ID を取得
        Item::factory()->count(10)->state(fn () => [
            'user_id' => $userIds[array_rand($userIds)] ?? 1,
        ])->create();
    }
}
