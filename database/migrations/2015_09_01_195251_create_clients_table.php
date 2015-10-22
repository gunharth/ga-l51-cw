<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ansprache');
            $table->string('firma')->index();
            $table->string('strasse');
            $table->string('plz');
            $table->string('ort');
            $table->string('tel');
            $table->string('vat_country');
            $table->integer('vat_number')->unsigned();
            $table->tinyInteger('agent')->unsigned()->default(0);
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
        Schema::drop('clients');
    }
}
