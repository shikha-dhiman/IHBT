<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllotedMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('alloted_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('receipt_id');
            $table->string('medicine_id');
            $table->string('quantity');
            $table->timestamps();
            $table->string('is_row');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alloted_medicines');

    }
}
