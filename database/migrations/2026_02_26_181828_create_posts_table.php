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
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id', true)->unique('id_unique');
            $table->integer('user_id')->index('blog_user_idx');
            $table->string('title', 128);
            $table->string('slug', 128);
            $table->string('picture', 128)->nullable();
            $table->text('short_content');
            $table->longText('content')->nullable();
            $table->dateTime('added');
            $table->timestamp('updated')->useCurrentOnUpdate()->useCurrent();
            $table->tinyInteger('comment')->default(0);
            $table->tinyInteger('pending')->default(0);
            $table->tinyInteger('public')->default(1);
            $table->tinyInteger('active')->default(1);

            $table->primary(['id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
