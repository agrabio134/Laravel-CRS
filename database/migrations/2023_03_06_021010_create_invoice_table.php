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
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade');

            $table->date('issue_date')->nullable();
            $table->date('due_date')->nullable();
            $table->decimal('total', 8, 2)->default(0.00);
            $table->boolean('paid')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
