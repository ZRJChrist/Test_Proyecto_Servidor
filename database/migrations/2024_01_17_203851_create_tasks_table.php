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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->foreignId('operator_id')->references('id')->on('users');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->foreignId('province_id')->references('id')->on('provinces');
            $table->foreignId('status_id')->references('id')->on('statuses');
            $table->date('scheduled_at');
            $table->string('pre_notes')->nullable();
            $table->string('later_notes')->nullable();
            $table->string('pdf_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
