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
            $table->string("name",100)->nullable();
            $table->string("company",100)->nullable();
            $table->integer('static')->nullable();
            $table->string("n",100)->nullable();
            $table->string("street",100)->nullable();
            $table->string("pc",100)->nullable();
            $table->string("city",100)->nullable();
            $table->string("maps",100)->nullable();
            $table->string("build",100)->nullable();
            $table->string("stairs",100)->nullable();
            $table->string("floor",100)->nullable();
            $table->string("door",100)->nullable();
            $table->string("code1",100)->nullable();
            $table->string("code2",100)->nullable();
            $table->string("intvw",100)->nullable();
            $table->string("time",100)->nullable();
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
