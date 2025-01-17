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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('depart_id');
            $table->string('specialist');
            $table->string('image');
            $table->string('fee');
            $table->string('clinic_address');
            $table->text('about');
            $table->timestamps();

            // foreign key
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('depart_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
