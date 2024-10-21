<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 投稿関連のマイグレーション
     * Run the migrations.
     */
    public function up(): void
    {
        // 投稿テーブル
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('main_text');
            $table->timestamps();
        });

        // 投稿画像テーブル
        Schema::create('post_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('post_id');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_images');
        Schema::dropIfExists('posts');
    }
};
