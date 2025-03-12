<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\UserTestFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Str::を使うので宣言


/**
 * Undocumented class
 */
/**
 * 開発用のダミーデータを作成します
 * 参考：https://taraoblog.com/laravel-seeder/
 *
 * 合計で　管理者１件、一般ユーザー１５件
 *
 */
class UserTestSeeder extends Seeder
{
    protected static ?string $password;
    public function run(): void
    {



        // usersテーブルを削除し、IDも１からにリセット
        DB::table('users')->truncate();

        // 固定のデータで管理者１件、一般ユーザー５件を作成
        User::insert([
            [
                // ###### テンプレート
                // 'name' =>  ,
                // 'email' => test@example.com,
                // 'email_verified_at' => $testDate = fake()->dateTimeThisMonth(), // 今回は使わないけど、メールアドレスを送って認証を確定するタイプのとき用。
                // 'password' => Hash::make('password'), // 人に読めないハッシュ化したパスワードを入れる。
                // 'remember_token' => Str::random(20), // 今回はつかないが「ログインしたままにする」機能を実装した時用、ランダム
                // 'created_at' =>  $testDate, // メールアドレス登録日と同じ
                // 'updated_at' =>  $testDate,
                // 'role' =>  // 管理者権限を0か1の整数でランダムに入れる。 rand(0,1)でもいい。

                'name' => '管理者のアド＝ミン',
                'email' => 'admin@example.com',
                'email_verified_at' => $testDate = fake()->dateTimeThisMonth(),
                'password' => Hash::make('adminpass'),
                'remember_token' => Str::random(20),
                'created_at' =>  $testDate,
                'updated_at' =>  $testDate,
                'role' => '1',
            ],
            [
                'name' => '一般 ゆうざ',
                'email' => 'general-u@example.com',
                'email_verified_at' => $testDate = fake()->dateTimeThisMonth(),
                'password' => Hash::make('genepass'),
                'remember_token' => Str::random(20),
                'created_at' =>  $testDate,
                'updated_at' =>  $testDate,
                'role' => '0',
            ],
            [
                'name' => 'チームいち太郎',
                'email' => 'taro@example.com',
                'email_verified_at' => $testDate = fake()->dateTimeThisMonth(),
                'password' => Hash::make('taropass'),
                'remember_token' => Str::random(20),
                'created_at' =>  $testDate,
                'updated_at' =>  $testDate,
                'role' => '0',
            ],
            [
                'name' => 'テック 次郎',
                'email' => 'jiro@example.com',
                'email_verified_at' => $testDate = fake()->dateTimeThisMonth(),
                'password' => Hash::make('jiropass'),
                'remember_token' => Str::random(20),
                'created_at' =>  $testDate,
                'updated_at' =>  $testDate,
                'role' => '0',
            ],
            [
                'name' => '島根 はな子',
                'email' => 'hana@example.com',
                'email_verified_at' => $testDate = fake()->dateTimeThisMonth(),
                'password' => Hash::make('hanapass'),
                'remember_token' => Str::random(20),
                'created_at' =>  $testDate,
                'updated_at' =>  $testDate,
                'role' => '0',
            ],
            [
                'name' => 'いぬやま ねこ',
                'email' => 'neko@example.com',
                'email_verified_at' => $testDate = fake()->dateTimeThisMonth(),
                'password' => Hash::make('nekopass'),
                'remember_token' => Str::random(20),
                'created_at' =>  $testDate,
                'updated_at' =>  $testDate,
                'role' => '0',
            ],
        ]);

        // 追加で一般ユーザーを10件作成、パスワードは全て：　　password
        UserTestFactory::new()->count(10)->create([
            'role' => '0',
        ]);
    }
}
