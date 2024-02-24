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
        Schema::create('registrants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->string('name');
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('birthplace')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', [1, 2])->nullable();
            $table->string('placechild')->nullable();
            $table->string('siblings')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrants');
    }
};
