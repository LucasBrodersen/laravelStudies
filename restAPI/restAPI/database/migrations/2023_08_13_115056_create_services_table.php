<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('cost');
            $table->string('status'); // A for active, C for Closed, etc..
            $table->dateTime('billed_date'); // Just for study will probably be deleted future
            $table->dateTime('paid_date')->nullable(); // Just for study
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
