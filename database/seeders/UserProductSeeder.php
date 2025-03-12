<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserTestFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserProductSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    /**
     * 本番用のusersテーブルを作成します。
     *
     * ユーザーの登録削除の権限を持った最初の１人の管理者だけを作成する。
     *
     *
     * 実行コマンド
     *  php artisan UserProductSeeder
     *
     * herokuの実行コマンド
     * heroku run --app  herokuに登録したアプリ名  php artisan UserProductSeeder
     *
     */
    public function run(): void
    {

        // usersテーブルを削除し初期化する
        DB::table('users')->truncate();

        // 管理者を１人作成
        UserTestFactory::new()->admin()->create([
            'name' => '最初の ひとり',
            'email' =>  'admin@example.com',
            'password' => Hash::make('adminpass'),
        ]);
    }
}
