<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $table = 'items';  // テーブルを設定
  
    protected $fillable = [ // 必要なカラムだけを登録
        'id',
        'category_id',
        'user_id',
        'date',
        'item_name',
        'price',
        'detail',
    ];

    protected $casts = [  // 型変換
        'created_at' => 'datetime:Y/m/d',
        'updated_at' => 'datetime:Y/m/d',
    ];

    // 所属テーブルから主テーブルへの関係を定義するときに使う
    public function category() : Relation {
        return $this->belongsTo(Category::class);
    }  
    
}
