<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('mobile')->unique(); //mendetory
            $table->string('mobilealt')->nullable();

            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            
            $table->string('status')->default("active")->comment("pending, active, blacklist");
            $table->string('role')->nullable();
          
            $table->rememberToken();

            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('last_logout_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
