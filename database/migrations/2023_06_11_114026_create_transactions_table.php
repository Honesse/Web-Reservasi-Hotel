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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('post_id');
            $table->boolean('paymentstatus')->default(FALSE);
            $table->boolean('checkout')->default(FALSE);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('estimate');
            $table->integer('no_kamar')->nullable();
            $table->integer('bill')->nullable();
            $table->varchar('title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
