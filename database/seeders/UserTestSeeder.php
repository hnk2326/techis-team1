<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Str::を使うので宣言

/**
 * 開発用のダミーデータを作成します
 * 参考：https://taraoblog.com/laravel-seeder/
 *
 * 管理者１件、一般ユーザー１５件
 *
 */
class UserTestSeeder extends Seeder
{

    public function __construct()
    {
        // usersテーブルを削除し、IDも１からにリセット // Laravelのバージョンに注意
        User::truncate();
    }

    // passwordのハッシュ化のための変数を宣言
    protected static ?string $password;

    /**
     * ユーザーのダミーデータ配列
     * herokuにデプロイした後の動作確認のため使用
     *  ※ fake()を使わずシードするため
     *
     */

    private $specials = [ // デモ用に使うためのアカウント
        ['name' => '管理者 一郎', 'email' => 'admin@example.com', 'password' => 'adminpass', 'role' => '1',],
        ['name' => 'チーム いち太郎', 'email' => 'taro@example.com', 'password' => 'taropass',],
    ];

    private $users = [
        ['name' => '一般 ゆうざ', 'email' => 'general-u@example.com', 'password' => ''],
        ['name' => 'テック 次郎', 'email' => 'jiro@example.com', 'password' => '',],
        ['name' => '島根 はな子', 'email' => 'hana@example.com', 'password' => '',],
        ['name' => 'いぬやま ねこ', 'email' => 'neko@example.com', 'password' => '',],
        ['name' => '村山 知実', 'email' => 'kfujimoto@example.com', 'password' => '',],
        ['name' => '松本 幹', 'email' => 'oishida@example.org', 'password' => '',],
        ['name' => '中津川 拓真', 'email' => 'yamamoto.minoru@example.org', 'password' => '',],
        ['name' => '宇野 真綾', 'email' => 'gaoyama@example.net', 'password' => '',],
        ['name' => '渚 幹', 'email' => 'kyosuke99@example.com', 'password' => '',],
        ['name' => '加納 陽子', 'email' => 'manabu.kondo@example.net', 'password' => '',],
        ['name' => '坂本 翔太', 'email' => 'osamu.miyazawa@example.net', 'password' => '',],
        ['name' => '笹田 陽一', 'email' => 'suzuki.chiyo@example.org', 'password' => '',],
        ['name' => '桐山 裕樹', 'email' => 'shota43@example.com', 'password' => '',],
        ['name' => '鈴木 翼', 'email' => 'ekoda.sayuri@example.org', 'password' => '',]
    ];



    /**
     * 実行メソッド
     *
     *
     */
    public function run(): void
    {

        User::insert(
            array_map( fn ($special) => [
                    'name' => $special['name'],
                    'email' => $special['email'],
                    'email_verified_at' => now(),
                    'password' => Hash::make($special['password']),
                    'remember_token' => Str::random(20),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'role' => $special['role'] ?? 0,
            ], $this->specials)
        );

        User::insert(
            array_map( fn ($user) => [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'email_verified_at' => now(),
                    'password' => Static::$password ??= Hash::make('password'),
                    'remember_token' => Str::random(20),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'role' => $user['role'] ?? 0,
            ], $this->users)
        );
    }

        // ###### テンプレート
        // 'name' =>  ,
        // 'email' => test@example.com,
        // 'email_verified_at' => $testDate = fake()->dateTimeThisMonth(), // 今回は使わないけど、メールアドレスを送って認証を確定するタイプのとき用。
        // 'password' => Hash::make('password'), // 人に読めないハッシュ化したパスワードを入れる。
        // 'remember_token' => Str::random(20), // 今回はつかないが「ログインしたままにする」機能を実装した時用、ランダム
        // 'created_at' =>  $testDate, // メールアドレス登録日と同じ
        // 'updated_at' =>  $testDate,
        // 'role' =>  // 管理者権限を0か1の整数でランダムに入れる。 rand(0,1)でもいい。
}
