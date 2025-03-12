<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;    // Item:: を使うためにuse宣言
use Illuminate\Support\Facades\DB;  // DB::table(~~~) を使うためにuse宣言

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *  ##### このファイルに書き込んであることが
     *
     *      php artisan db:seed     (--class= ~~ なし)
     *      ^^^^^^^^^^^^^^^^^^^
     *
     *      のコマンドで実行される。
     */
    public function run(): void
    {

        // アイテムを50件作成
        Item::factory(50)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // $this->call([ ~~ ])の中に自分で作ったSeeder.phpを書いておくと
        // ターミナル上で  Database\Seeders\UserSeeder...............　など実行状況が表示される
        $this->call([
            UserTestSeeder::class,
        ]);


    }
}
