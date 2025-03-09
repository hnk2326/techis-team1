<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // IDをリセットしてからダミーデータを作成
        DB::table('items')->truncate(); 

        Item::factory()->count(50)->create(); // 50件のダミーデータを作成
    }
}
