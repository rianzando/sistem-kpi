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
        Schema::create('kpi_corporates', function (Blueprint $table) {
            $table->id();
            $table->string('corporate')->nullable()->default('PT MPK');
            $table->text('goals')->nullable();
            $table->text('kpi_corporate');
            $table->text('target_corporate');
            $table->integer('bobot')->nullable()->default(0);
            $table->year('year');
            $table->integer('achievement')->nullable()->default(0);
            $table->string('status')->nullable()->default('Open');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('updated')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_corporates');
    }
};