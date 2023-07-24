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
        Schema::create('kpi_departements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kpi_directorate_id');
            $table->unsignedBigInteger('departement_id');
            $table->string('framework');
            $table->string('kpi_departement');
            $table->string('target_departement')->nullable();
            $table->year('year');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('achievement')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('kpi_departments');
    }
};