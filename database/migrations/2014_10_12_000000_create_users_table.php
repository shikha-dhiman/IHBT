<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
            $table->string('name');
            $table->string('mobile')->unique();
            $table->string('email');
            $table->string('designation');
            $table->string('division')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('date_of_retirement')->nullable();
            $table->string('employee_address');
            $table->string('family_member');
            $table->string('regular_medicine')->nullable();
            $table->string('pre_existing_condition_disease')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('image')->nullable();
            $table->string('employee_type')->nullable();
            $table->string('ppo_no')->nullable();
            $table->string('cont_amt')->nullable();
            $table->string('ward')->nullable();
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
        Schema::dropIfExists('users');
    }
}
