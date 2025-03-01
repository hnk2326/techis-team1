<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * usersテーブルについて修正(modify)をします
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->tinyInteger('role')
                ->unsigned() // マイナス無し
                ->index('role') // 権限者だけ抽出する時に早くなるように？
                ->default(0) // 指定しなければ「0:権限ナシ」を自動で設定
                ->comment('権限ロール:0-1、1:権限者') //データベース上に表示するコメント
                    ->change(); // 変更するためのメソッド・関数
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
