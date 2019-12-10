<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('row_id');
            $table->integer('sat')->nullable();
            $table->integer('sun')->nullable();
            $table->integer('mon')->nullable();
            $table->integer('thus')->nullable();
            $table->integer('wed')->nullable();
            $table->integer('thur')->nullable();
            $table->unsignedbigInteger('studentclass_id');
            $table->foreign('studentclass_id')->references('id')->on('studentclasses')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tables');
    }
}
