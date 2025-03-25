<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Database\Factories\ItemFactory;


/**
 * Undocumented class
 */

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // IDをリセットしてからダミーデータを作成
        // DB::table('items')->truncate();

        // array_rand($userIds) で ランダムな id を選択users、戻り値：配列のキー
        // User::pluck('id')->toArray() で すべての id を配列で取得

        $userIds = User::pluck('id')->toArray(); // users テーブルの全 ID を取得
        // $userIds = User::pluck('id'); // users テーブルの全 ID を取得
        // Item::factory()->count(20)->state(fn () => [    // ダミーデータの件数を指定して作成
        //     'user_id' => $userIds[array_rand($userIds)] ?? 1, // 期待される値は 1, 2, 3,・・・・のようなinteger 整数
        // ])->create();

        ItemFactory::new()->count(20)->create([
            'user_id' =>$userIds[array_rand($userIds,1)] ?? 1,
        ]);


    }
}
