<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('filepath');
            $table->string('weight')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('partner_id')->nullable();
            
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
