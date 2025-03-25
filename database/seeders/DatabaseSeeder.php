<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
     *      ターミナルで実行するherokuコマンドは --class=のオプションが使えない！！
     *      heroku run --app team1 php artisan db:seed --class=UserSeeder
     *                                                 ^^^^^^^^^^^^^^^^^^
     *      なので、classオプション無しのコマンドでまとめて実行する
     *      heroku run --app team1 php artisan db:seed
     */
    public function run(): void
    {

        // $this->call([ ~~ ])の中に自分で作ったSeeder.phpを書いておくと
        // ターミナル上で  Database\Seeders\UserSeeder............... など実行状況が表示される
        $this->call([
            UserTestSeeder::class,
            ItemSeeder::class,
        ]);


    }
}
