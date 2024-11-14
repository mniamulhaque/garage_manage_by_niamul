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
        Schema::create('job_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('job_no');
            $table->string('date');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('color');
            $table->string('driver_name');
            $table->string('mob');
            $table->string('vehicle_incoming_date');
            $table->string('vehicle_outgoing_date');
            $table->string('received_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_sheets');
    }
};
