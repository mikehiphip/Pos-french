<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('de_id');
            $table->string("emp_code",100)->nullable();
            $table->string("first_name",100)->nullable();
            $table->string("last_name",100)->nullable();
            $table->string("nickname",100)->nullable();
            $table->string("sex",100)->nullable();
            $table->string("age",100)->nullable();
            $table->string("card_id",100)->nullable();
            $table->date("birthday",100)->nullable();
            $table->text("address")->nullable();
            $table->string("phone",100)->nullable();
            $table->string("email",100)->nullable();
            $table->string("time_in",100)->nullable();
            $table->string("time_out",100)->nullable();
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
        Schema::dropIfExists('tb_info');
    }
}
