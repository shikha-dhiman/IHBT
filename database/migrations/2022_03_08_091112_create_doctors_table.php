<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
            $table->string('name');
            $table->string('mobile')->unique();
            $table->string('email');
            $table->string('designation');
            $table->string('division');
            $table->string('employee_id');
            $table->string('dob');
            $table->string('date_of_retirement');
            $table->string('employee_address');
            $table->string('family_member');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('image')->nullable();
            $table->string('employee_type')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('doctors');
    }
}
