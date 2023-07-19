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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->bigInteger('nik');
            $table->string('domisili');
            $table->text('address')->nullable();
            $table->unsignedInteger('departement_id');
            $table->string('position');
            $table->string('level');
            $table->string('location');
            $table->string('spk_status');
            $table->dateTime('first_work_date')->nullable();
            $table->dateTime('end_work_date')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('gender');
            $table->string('education')->nullable();
            $table->string('name_of_place')->nullable();
            $table->string('major')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
