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
        Schema::create('trend_tb', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('datetime');
            $table->integer('ranking')->nullable();
            $table->longText('category', 100)->nullable();
            $table->longText('trendingwords', 100)->nullable();
            $table->bigInteger('tweetsnumber')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trend_tb');
    }
};
