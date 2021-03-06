<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatInseratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_inserat', function (Blueprint $table) {
            $table->integer('format_id')->unsigned()->index();
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
            $table->integer('inserat_id')->unsigned()->index();
            $table->foreign('inserat_id')->references('id')->on('inserate')->onDelete('cascade');
            $table->tinyInteger('pr')->unsigned()->default(0);
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
        Schema::drop('format_inserat');
    }
}
