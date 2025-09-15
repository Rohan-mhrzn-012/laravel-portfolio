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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('organization');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on ('users')
                ->onDelete('cascade');//if a user is deleted, their experience also deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
