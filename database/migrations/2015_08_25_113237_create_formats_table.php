<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('issue_id')->unsigned();
            $table->tinyInteger('type')->unsigned()->default(0);
            $table->tinyInteger('art')->unsigned()->default(0);
            $table->string('name');
            $table->decimal('preis', 7, 2);
            $table->decimal('flaeche', 7, 2);
            $table->timestamps();

            $table->foreign('issue_id')
                  ->references('id')
                  ->on('issues')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('formats');
    }
}
