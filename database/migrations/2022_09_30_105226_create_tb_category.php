<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name",100)->nullable();
            $table->string("color",100)->nullable();

            $table->integer('sort')->nullable();
            $table->enum("status_speical",['on','off'])->nullable();
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
        Schema::dropIfExists('tb_category');
    }
}
