<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cus_id');
            $table->enum("typ",['1','2']);
            $table->enum("member",['yes','no'])->default('no');
            $table->integer('total_qty');
            $table->integer("discount");
            $table->string("total_price",100);
            $table->string("prefix",255);
            $table->integer('number');
            $table->string("total_paid",100);
            $table->integer("pt_cde")->nullable();
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
        Schema::dropIfExists('tb_order');
    }
}
