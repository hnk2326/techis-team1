<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash; // Hash::を使うので宣言
use Illuminate\Support\Str; // Str::を使うので宣言
use App\Models\User; // 作ってあるUserに入れていくので宣言


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserTestFactory extends Factory
{
    // モデルクラスの呼び出し、$modelインスタンス作成
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    /**
     * 変数 $password を使うので宣言します
     * このクラス内だけで使います
     * ?string : nullでも良いです。
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     * define：定義
     * 作るuserテーブルのモデルに入れる値を定義、決めます
     *
     * fake：ニセモノ
     * fake()：PHPのfakerという、ダミーデータを作る機能を呼び出して使う
     *
     * （参考）日本語だとこういう感じのそれっぽいデータをランダムで作ってくれる。
     * https://faker.readthedocs.io/en/master/locales/ja_JP.html
     *
     * 日本語で作る場合、config\app.phpで設定を変える必要があります。
     * 'faker_locale' => 'en_US',  ===>  'faker_locale' => 'ja_JP',
     *
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // ランダムに日本語の姓名を作成（例）渡辺 貴弘
            'email' => fake()->unique()->safeEmail(), // ランダムに現実に無い安全な形のメールアドレスをつくる。uniqueでダブり無しを指定。
            'email_verified_at' => $testDate = fake()->dateTimeThisMonth(), // 今回は使わないけど、メールアドレスを送って認証を確定するタイプのとき用。１か月前までの日時をランダムに
            'password' => static::$password ??= Hash::make('password'), // 人に読めないハッシュ化したパスワードを入れる。パスワード文字列は ' password 'で全部統一。
            'remember_token' => Str::random(20), // 今回はつかないが「ログインしたままにする」機能を実装した時用
            'created_at' =>  $testDate,
            'updated_at' =>  $testDate,
            'role' => fake()->numberBetween(0,1) // 管理者権限を0か1の整数でランダムに入れる。 rand(0,1)でもいい。

        ];
    }

    /**
     * 管理者権限のユーザーのデータを作成したいとき用のメソッドを登録
     *
     * メソッド呼び出し例
     * UserTestFactory::new()->admin()
     *                        ^^^^^^^
     *
     * 上記のdefinitionから一部のカラムを指定した値にしたデータを作る
     *
     * @return static
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [ // 定型句として使う
            'password' => static::$password ??= Hash::make('adminpass'), // パスワード文字列は ' adminpass 'で全部統一。
            'role' => 1, // admin()で呼び出されたら、roleは1に固定する。（fake()も使えるはず）
        ]);
    }

    /**
     * 管理者なし、一般ユーザーのデータを作成したいとき用のメソッドを登録
     *
     * UserTestFactory::new()->general()
     *                        ^^^^^^^
     *
     * @return static
     */
    public function general(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 0,
        ]);
    }
}
