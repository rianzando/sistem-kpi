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
        Schema::create('kpi_directorates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kpi_corporate_id');
            $table->unsignedBigInteger('directorate_id');
            $table->string('kpi_directorate');
            $table->string('target');
            $table->text('description')->nullable();
            $table->year('year');
            $table->integer('achievement');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('updated')->nullable();
            $table->unsignedBigInteger('deleted')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_directorates');
    }
};