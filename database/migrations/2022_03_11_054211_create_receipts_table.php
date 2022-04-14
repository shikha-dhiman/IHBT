<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('family_id')->nullable();
            $table->string('registration_no');
            $table->string('date');
            $table->string('patient_name');
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('blood_sugar')->nullable();
            $table->string('temperature')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('pdf')->nullable();
            $table->string('is_created');
            $table->timestamps();
            $table->string('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
