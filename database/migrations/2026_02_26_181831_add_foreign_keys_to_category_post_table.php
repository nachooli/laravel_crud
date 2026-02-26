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
        Schema::table('category_post', function (Blueprint $table) {
            $table->foreign(['category_id'], 'category_post_category')->references(['id'])->on('categories')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['post_id'], 'category_post_post')->references(['id'])->on('posts')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_post', function (Blueprint $table) {
            $table->dropForeign('category_post_category');
            $table->dropForeign('category_post_post');
        });
    }
};
