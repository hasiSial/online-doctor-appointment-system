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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doc_id');
            $table->unsignedBigInteger('patient_id');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->enum('status', ['pending', 'approve', 'comfirm', 'reject'])->default('pending');
            $table->timestamps();

            // foreign key
            $table->foreign('doc_id')->references('id')->on('doctors');
            $table->foreign('patient_id')->references('id')->on('patients');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
