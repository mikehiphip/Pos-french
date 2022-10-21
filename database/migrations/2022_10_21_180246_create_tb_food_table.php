<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cat_id')->nullable();
            $table->string("name",100)->nullable();
            $table->string("color",100)->nullable();
            $table->string("price",100)->nullable();
            $table->integer('sort')->nullable();
            $table->enum("status",['on','off'])->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_food');
    }
}
