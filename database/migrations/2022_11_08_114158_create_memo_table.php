<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo', function (Blueprint $table) {
            $table->id();
            $table->integer('odependency_id');
            $table->foreign('odependency_id')->references('id')->on('dependencies');
            $table->string('number_memo');
            $table->string('ref_obs');
            $table->date('date_doc');
            $table->timestamp('date_entry');
            $table->timestamp('date_exit');
            $table->integer('ddependency_id');
            $table->foreign('ddependency_id')->references('id')->on('dependencies');
            $table->integer('admin_user_id');
            $table->foreign('admin_user_id')->references('id')->on('admin_users');
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
        Schema::dropIfExists('memo');
    }
}
