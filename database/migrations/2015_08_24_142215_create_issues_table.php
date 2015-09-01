<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medium_id')->unsigned();
            $table->string('name');
            $table->date('redaktionsschluss');
            $table->date('drucktermin');
            $table->date('erscheinungstermin');
            $table->string('druckerei');
            $table->string('vertrieb');
            $table->string('druckauflage');
            $table->boolean('archive');
            $table->index('archive');
            $table->timestamps();

            $table->foreign('medium_id')
                  ->references('id')
                  ->on('medium')
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
        Schema::drop('issues');
    }
}
