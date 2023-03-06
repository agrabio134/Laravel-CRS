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
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('make')->default('untitled');
            $table->string('model')->default('untitled');
            $table->date('year')->nullable();
            $table->decimal('daily_rate', 8, 2)->default(0.00);
            $table->string('thumbnail')->nullable();
            $table->string('description')->nullable();
            $table->boolean('available')->default(1);
            $table->unsignedInteger('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
