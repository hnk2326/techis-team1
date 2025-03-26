<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;

class ItemSeeder extends Seeder
{

    /**
     * コンストラクタ
     * まずitemsテーブルをリセットする
     */
    public function __construct()
    {
        Item::truncate();
    }

    private $items = [
        ['category_id' => 3, 'name' => 'アイロン','detail' => 'しわをきれいに伸ばせるアイロン'],
        ['category_id' => 1, 'name' => 'インスタントラーメン', 'detail' => '手軽に作れる美味しいラーメン'],
        ['category_id' => 1, 'name' => 'お好み焼き粉', 'detail' => '手軽に美味しいお好み焼きが作れる粉'],
        ['category_id' => 1, 'name' => 'お茶', 'detail' => '上品な香りの緑茶'],
        ['category_id' => 1, 'name' => 'クッキー', 'detail' => 'バター風味でサクサクのクッキー'],
        ['category_id' => 1, 'name' => 'コーヒー豆', 'detail' => '香り高いコーヒー豆'],
        ['category_id' => 1, 'name' => 'ジャガイモ', 'detail' => '国産'],
        ['category_id' => 1, 'name' => 'ジュース', 'detail' => '果汁100%のジュース'],
        ['category_id' => 1, 'name' => 'ジュース', 'detail' => 'フレッシュな果汁100%のジュース'],
        ['category_id' => 1, 'name' => 'ソース', 'detail' => '濃い味わいで料理にぴったりなソース'],
        ['category_id' => 1, 'name' => 'チーズ', 'detail' => 'まろやかで濃厚なチーズ'],
        ['category_id' => 1, 'name' => 'チョコレート', 'detail' => '甘くて濃厚なチョコレート'],
        ['category_id' => 2, 'name' => 'ティッシュ', 'detail' => 'しっかりとした使い心地'],
        ['category_id' => 2, 'name' => 'トイレットペーパー', 'detail' => '経済的で長持ちするトイレットペーパー'],
        ['category_id' => 1, 'name' => 'ハム', 'detail' => '贅沢な味わいのスライスハム'],
        ['category_id' => 1, 'name' => 'パン',  'detail' => '焼きたてのふわふわパン'],
        ['category_id' => 1, 'name' => 'ビスケット', 'detail' => 'サクサクとした食感のビスケット'],
        ['category_id' => 3, 'name' => 'フライパン', 'detail' =>  '軽量で使いやすいフライパン'],
        ['category_id' => 1, 'name' => 'フランスパン', 'detail' => '焼きたてのフランスパン'],
        ['category_id' => 3, 'name' => 'ポット', 'detail' =>  '温かい飲み物を長時間保温'],
        ['category_id' => 2, 'name' => 'マスク', 'detail' => '快適に使える高性能マスク'],
        ['category_id' => 3, 'name' => 'まな板', 'detail' =>  '抗菌加工が施されたまな板'],
        ['category_id' => 1, 'name' => 'マヨネーズ', 'detail' => '濃厚でクリーミーなマヨネーズ'],
        ['category_id' => 3, 'name' => 'ミキサー', 'detail' =>  'スムージー作りに便利なミキサー'],
        ['category_id' => 1, 'name' => 'ヨーグルト', 'detail' => '乳酸菌たっぷりのヨーグルト'],
        ['category_id' => 1, 'name' => '果物', 'detail' => '旬のフルーツ'],
        ['category_id' => 2, 'name' => '歯ブラシ', 'detail' => '磨きやすいデザインで歯に優しい'],
        ['category_id' => 3, 'name' => '除湿機', 'detail' =>  '湿気を取る優れた除湿機'],
        ['category_id' => 2, 'name' => '洗剤', 'detail' => '洗浄力が強く、環境にも優しい'],
        ['category_id' => 3, 'name' => '電気ケトル', 'detail' =>  '1リットルの容量で短時間でお湯が沸く'],
        ['category_id' => 1, 'name' => '豆腐', 'detail' => '栄養満点な国産豆腐'],
        ['category_id' => 1, 'name' => '肉', 'detail' => '国産＆輸入品'],
        ['category_id' => 1, 'name' => '肉', 'detail' => '国産'],
        ['category_id' => 1, 'name' => '納豆', 'detail' => '健康に良い納豆'],
        ['category_id' => 1, 'name' => '米' , 'detail' => '高品質な国内産のお米'],
        ['category_id' => 1, 'name' => '米', 'detail' => '国内産のお米'],
        ['category_id' => 1, 'name' => '野菜',  'detail' => '有機野菜'],
        ['category_id' => 1, 'name' => '野菜', 'detail' => '国産野菜'],
        ['category_id' => 4, 'name' => '牡丹の鉢植え', 'price' => 17400, 'detail' => '大根島の牡丹祭り、デカくてきれい'],
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // ヘルパを使うために、collect()で配列をCollection型にかえる
        // shuffle()ヘルパでこのクラス内で定義した$itemsの配列の順番をシャッフル
        // random()ヘルパで、20個をランダムに選び出す
        // map(function)ヘルパで、fn = functionのプログラムコードにしたがって配列全てを処理
        // toArray()ヘルパで配列型に戻す
        // その配列をinsert()に渡してitemsテーブルにまとめてレコードを保存

        // これを5回繰り返し、計100レコードを保存
        $loop = 5; // この回数だけ繰り返す

        while ($loop-- > 0) {
            Item::insert(
                collect($this->items)
                    ->shuffle()
                    ->random(20)
                    ->map(fn ($item) => [
                        'category_id' => $item['category_id'],
                        'user_id' => User::pluck('id')->random() ?? 1, // 登録されているユーザーIDからランダムに選ぶ
                        'date' => today()->subDays(rand(1, 30)), // 過去30日間のランダムな日付
                        'item_name' => $item['name'],
                        'price' => $item['price'] ?? rand(100, 10000),
                        'detail' => $item['detail'],
                        'created_at' => now(),
                        'updated_at' => now(),
                ])->toArray()
            );
        }
    }
}
