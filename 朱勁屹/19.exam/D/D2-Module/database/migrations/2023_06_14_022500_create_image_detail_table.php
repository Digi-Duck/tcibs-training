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
            $table->string('userId');
            $table->string('title');
            $table->string('description');
            $table->integer('width');
            $table->integer('height');
            $table->string('mimetype');
            $table->integer('view_count');
            $table->string('updated_at');
            $table->string('created_at');
            $table->integer('delete');
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
