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
        Schema::create('paper_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_sheet_id');
            $table->text('date');
            $table->text('tax_token');
            $table->text('tax_token_note');
            $table->text('fitness');
            $table->text('fitness_note');
            $table->text('milage');
            $table->text('milage_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paper_histories');
    }
};
