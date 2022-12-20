<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("main_phone",100)->nullable();
            $table->text("phone")->nullable();
            $table->string("name",100)->nullable();
            $table->string("company",100)->nullable();
            $table->integer('static')->nullable();
            $table->string("n",255)->nullable();
            $table->string("street",255)->nullable();
            $table->string("pc",255)->nullable();
            $table->string("city",255)->nullable();
            $table->string("zone",255)->nullable();
            $table->integer('charge')->nullable();
            $table->integer('pay')->nullable(); 
            $table->string("build",255)->nullable();
            $table->string("stairs",255)->nullable();
            $table->string("floor",255)->nullable();
            $table->string("door",255)->nullable();
            $table->string("code1",255)->nullable();
            $table->string("code2",255)->nullable();
            $table->string("intvw",255)->nullable();
            $table->string("time",255)->nullable();
            $table->text("note")->nullable();
            $table->text("order_note")->nullable();
            $table->text("info")->nullable();
            $table->string("email",100)->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_customer');
    }
}
