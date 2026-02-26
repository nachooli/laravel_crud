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
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id', true)->unique('id_unique');
            $table->integer('post_id')->nullable();
            $table->integer('user_id')->index('comment_user_idx');
            $table->longText('content')->nullable();
            $table->timestamp('datetime')->useCurrentOnUpdate()->useCurrent();

            $table->primary(['id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
