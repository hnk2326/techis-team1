<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();	
            $table->biginteger('category_id')->unsigned()->index();	
            $table->biginteger('user_id')->unsigned()->index();	
            $table->date('date');	
            $table->string('item_name', 100);	
            $table->biginteger('price');	
            $table->string('detail', 500);	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
