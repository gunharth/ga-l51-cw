<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInserateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inserate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('issue_id')->unsigned();
            $table->tinyInteger('type')->unsigned();
            $table->tinyInteger('art')->unsigned();
            $table->decimal('strecke', 7, 2);
            $table->decimal('preis', 7, 2);
            $table->integer('rabatt');
            $table->decimal('preis2', 7, 2);
            $table->integer('provision');
            $table->decimal('preis3', 7, 2);
            $table->integer('werbeabgabe');
            $table->decimal('preis4', 7, 2);
            $table->decimal('brutto', 7, 2);
            $table->timestamps();
            
            $table->index('type');
            $table->index('art');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients');
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
        Schema::drop('inserate');
    }
}
