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
        Schema::create('image_detail', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('author');
            $table->string('title');
            $table->string('description');
            $table->string('width');
            $table->string('heigh');
            $table->string('mimetype');
            $table->string('view_count');
            $table->string('updatedAt');
            $table->string('createAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_detail');
    }
};
