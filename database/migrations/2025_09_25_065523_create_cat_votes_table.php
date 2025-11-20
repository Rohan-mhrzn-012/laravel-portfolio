<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cat_votes', function (Blueprint $table) {
            $table->id();
            $table->string('image_id');
            $table->string('sub_id')->nullable();
            $table->integer('value'); // 1 (upvote), -1 (downvote)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_votes');
    }
};
