<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medium', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('cover');
            $table->string('eventColor');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medium');
    }
}
