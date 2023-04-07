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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('img_path')->nullable()->comment('圖片路徑'); //圖片路徑
            $table->float('img_opacity')->nullable()->comment('透明度'); // 透明度
            $table->integer('weight')->nullable()->comment('權重'); //權重
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
