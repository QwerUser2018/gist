<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("gist_name");
            $table->longText("gist_text");
            $table->bigInteger("cat_id")->unsigned();
            $table->timestamps();
            $table->foreign('cat_id')->references('id')->on('categories')
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
        Schema::dropIfExists('gist');
    }
}
