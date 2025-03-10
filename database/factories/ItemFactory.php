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
             ['name' => 'アイロン', 'category_id' => 3, 'detail' => 'しわをきれいに伸ばせるアイロン'],
             ['name' => 'インスタントラーメン', 'category_id' => 1, 'detail' => '手軽に作れる美味しいラーメン'],
             ['name' => 'お好み焼き粉', 'category_id' => 1, 'detail' => '手軽に美味しいお好み焼きが作れる粉'],
             ['name' => 'お茶', 'category_id' => 1, 'detail' => '上品な香りの緑茶'],
             ['name' => 'クッキー', 'category_id' => 1, 'detail' => 'バター風味でサクサクのクッキー'],
             ['name' => 'コーヒー豆', 'category_id' => 1, 'detail' => '香り高いコーヒー豆'],
             ['name' => 'ジャガイモ', 'category_id' => 1, 'detail' => '国産'],
             ['name' => 'ジュース', 'category_id' => 1, 'detail' => '果汁100%のジュース'],
             ['name' => 'ジュース', 'category_id' => 1, 'detail' => 'フレッシュな果汁100%のジュース'],
             ['name' => 'ソース', 'category_id' => 1, 'detail' => '濃い味わいで料理にぴったりなソース'],
             ['name' => 'チーズ', 'category_id' => 1, 'detail' => 'まろやかで濃厚なチーズ'],
             ['name' => 'チョコレート', 'category_id' => 1, 'detail' => '甘くて濃厚なチョコレート'],
             ['name' => 'ティッシュ', 'category_id' => 2, 'detail' => 'しっかりとした使い心地'],
             ['name' => 'トイレットペーパー', 'category_id' => 2, 'detail' => '経済的で長持ちするトイレットペーパー'],
             ['name' => 'ハム', 'category_id' => 1, 'detail' => '贅沢な味わいのスライスハム'],
             ['name' => 'パン', 'category_id' => 1, 'detail' => '焼きたてのふわふわパン'],
             ['name' => 'ビスケット', 'category_id' => 1, 'detail' => 'サクサクとした食感のビスケット'],
             ['name' => 'フライパン', 'category_id' => 3, 'detail' =>  '軽量で使いやすいフライパン'],
             ['name' => 'フランスパン', 'category_id' => 1, 'detail' => '焼きたてのフランスパン'],
             ['name' => 'ポット', 'category_id' => 3, 'detail' =>  '温かい飲み物を長時間保温'],
             ['name' => 'マスク', 'category_id' => 2, 'detail' => '快適に使える高性能マスク'],
             ['name' => 'まな板', 'category_id' => 3, 'detail' =>  '抗菌加工が施されたまな板'],
             ['name' => 'マヨネーズ', 'category_id' => 1, 'detail' => '濃厚でクリーミーなマヨネーズ'],
             ['name' => 'ミキサー', 'category_id' => 3, 'detail' =>  'スムージー作りに便利なミキサー'],
             ['name' => 'ヨーグルト', 'category_id' => 1, 'detail' => '乳酸菌たっぷりのヨーグルト'],
             ['name' => '果物', 'category_id' => 1, 'detail' => '旬のフルーツ'],
             ['name' => '歯ブラシ', 'category_id' => 2,'detail' => '磨きやすいデザインで歯に優しい'],
             ['name' => '除湿機', 'category_id' => 4, 'detail' =>  '湿気を取る優れた除湿機'],
             ['name' => '洗剤', 'category_id' => 2, 'detail' => '洗浄力が強く、環境にも優しい'],
             ['name' => '電気ケトル', 'category_id' => 3, 'detail' =>  '1リットルの容量で短時間でお湯が沸く'],
             ['name' => '豆腐', 'category_id' => 1, 'detail' => '栄養満点な国産豆腐'],
             ['name' => '肉', 'category_id' => 1, 'detail' => '国産＆輸入品'],
             ['name' => '肉', 'category_id' => 1, 'detail' => '国産'],
             ['name' => '納豆', 'category_id' => 1, 'detail' => '	健康に良い納豆'],
             ['name' => '米' , 'category_id' => 1, 'detail' => '高品質な国内産のお米'],
             ['name' => '米', 'category_id' => 1, 'detail' => '国内産のお米'],
             ['name' => '野菜', 'category_id' => 1, 'detail' => '有機野菜'],
             ['name' => '野菜', 'category_id' => 1, 'detail' => '国産野菜']
        ];

        // item_name をランダムに選ぶ
        $item = $this->faker->randomElement($items);

        return [
            'category_id' => $item['category_id'],
            'user_id' => User::inRandomOrder()->first()->id ?? 1,  // 'user_id' => 1, // 必要ならランダムなユーザーIDに変更
            'date' => Carbon::now()->subDays(rand(1, 30)), // 過去30日間のランダムな日付
            'item_name' => $item['name'],
            'price' => $this->faker->numberBetween(100, 10000),
            'detail' => $item['detail'], // item_name に応じた detail を設定
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
