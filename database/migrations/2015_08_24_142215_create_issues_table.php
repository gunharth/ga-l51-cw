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
            $table->integer('seiten');
            $table->decimal('sollumsatz', 7, 2);
            $table->decimal('basisanbot', 7, 2);
            $table->decimal('redaktion', 7, 2);
            $table->decimal('fotokosten', 7, 2);
            $table->decimal('grafik', 7, 2);
            $table->decimal('lektorat', 7, 2);
            $table->decimal('mehrseiten', 7, 2);
            $table->decimal('druck', 7, 2);
            $table->decimal('vertriebkosten', 7, 2);
            $table->decimal('sonderkosten', 7, 2);
            $table->boolean('archive');
            $table->index('archive');
            $table->timestamps();
            $table->softDeletes();

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
