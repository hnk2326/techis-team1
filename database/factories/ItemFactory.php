<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // item_nameのリスト
        $items = [
             ['category_id' => 3,'item_name' => 'アイロン','detail' => 'しわをきれいに伸ばせるアイロン'],
             ['category_id' => 1,'item_name' => 'インスタントラーメン', 'detail' => '手軽に作れる美味しいラーメン'],
             ['category_id' => 1,'item_name' => 'お好み焼き粉', 'detail' => '手軽に美味しいお好み焼きが作れる粉'],
             ['category_id' => 1,'item_name' => 'お茶', 'detail' => '上品な香りの緑茶'],
             ['category_id' => 1,'item_name' => 'クッキー', 'detail' => 'バター風味でサクサクのクッキー'],
             ['category_id' => 1,'item_name' => 'コーヒー豆', 'detail' => '香り高いコーヒー豆'],
             ['category_id' => 1,'item_name' => 'ジャガイモ', 'detail' => '国産'],
             ['category_id' => 1,'item_name' => 'ジュース', 'detail' => '果汁100%のジュース'],
             ['category_id' => 1,'item_name' => 'ジュース', 'detail' => 'フレッシュな果汁100%のジュース'],
             ['category_id' => 1,'item_name' => 'ソース', 'detail' => '濃い味わいで料理にぴったりなソース'],
             ['category_id' => 1,'item_name' => 'チーズ', 'detail' => 'まろやかで濃厚なチーズ'],
             ['category_id' => 1,'item_name' => 'チョコレート', 'detail' => '甘くて濃厚なチョコレート'],
             ['category_id' => 2,'item_name' => 'ティッシュ', 'detail' => 'しっかりとした使い心地'],
             ['category_id' => 2,'item_name' => 'トイレットペーパー', 'detail' => '経済的で長持ちするトイレットペーパー'],
             ['category_id' => 1,'item_name' => 'ハム', 'detail' => '贅沢な味わいのスライスハム'],
             ['category_id' => 1,'item_name' => 'パン',  'detail' => '焼きたてのふわふわパン'],
             ['category_id' => 1,'item_name' => 'ビスケット', 'detail' => 'サクサクとした食感のビスケット'],
             ['category_id' => 2,'item_name' => 'フライパン', 'detail' =>  '軽量で使いやすいフライパン'],
             ['category_id' => 3,'item_name' => 'フランスパン', 'detail' => '焼きたてのフランスパン'],
             ['category_id' => 3,'item_name' => 'ポット', 'detail' =>  '温かい飲み物を長時間保温'],
             ['category_id' => 2,'item_name' => 'マスク', 'detail' => '快適に使える高性能マスク'],
             ['category_id' => 3,'item_name' => 'まな板', 'detail' =>  '抗菌加工が施されたまな板'],
             ['category_id' => 1,'item_name' => 'マヨネーズ', 'detail' => '濃厚でクリーミーなマヨネーズ'],
             ['category_id' => 3,'item_name' => 'ミキサー', 'detail' =>  'スムージー作りに便利なミキサー'],
             ['category_id' => 1,'item_name' => 'ヨーグルト', 'detail' => '乳酸菌たっぷりのヨーグルト'],
             ['category_id' => 1,'item_name' => '果物', 'detail' => '旬のフルーツ'],
             ['category_id' => 2,'item_name' => '歯ブラシ', 'detail' => '磨きやすいデザインで歯に優しい'],
             ['category_id' => 3,'item_name' => '除湿機', 'detail' =>  '湿気を取る優れた除湿機'],
             ['category_id' => 2,'item_name' => '洗剤', 'detail' => '洗浄力が強く、環境にも優しい'],
             ['category_id' => 3,'item_name' => '電気ケトル', 'detail' =>  '1リットルの容量で短時間でお湯が沸く'],
             ['category_id' => 1,'item_name' => '豆腐', 'detail' => '栄養満点な国産豆腐'],
             ['category_id' => 1,'item_name' => '肉', 'detail' => '国産＆輸入品'],
             ['category_id' => 1,'item_name' => '肉', 'detail' => '国産'],
             ['category_id' => 1,'item_name' => '納豆', 'detail' => '健康に良い納豆'],
             ['category_id' => 1,'item_name' => '米' , 'detail' => '高品質な国内産のお米'],
             ['category_id' => 1,'item_name' => '米', 'detail' => '国内産のお米'],
             ['category_id' => 1,'item_name' => '野菜',  'detail' => '有機野菜'],
             ['category_id' => 1,'item_name' => '野菜', 'detail' => '国産野菜']
        ];

        // item_name をランダムに選ぶ
        $item = $this->faker->randomElement($items);
        // optionalでNULLにならず、デフォルトの１が入る方法（optional(User::inRandomOrder()->first())->id ?? 1,）
        // ユーザーが１人もいないときに（User::exists() ? User::inRandomOrder()->first()->id : 1）
        // User::inRandomOrder()->value('id') ?? 1, // `value('id')` で `id` だけ取得

        // 今回使用
        // テーブルが空なら 1 をセット（!empty($userIds) ? ... : 1）

        return [
            'category_id' => $item['category_id'],
            'user_id' => User::exists() ? User::inRandomOrder()->value('id') : 1, // 格納したいデータ 1,2,3,....のようなint型整数
            'date' => Carbon::now()->subDays(rand(1, 30)), // 過去30日間のランダムな日付
            'item_name' => $item['item_name'],
            'price' => $this->faker->numberBetween(100, 10000),
            'detail' => $item['detail'], // item_name に応じた detail を設定
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
