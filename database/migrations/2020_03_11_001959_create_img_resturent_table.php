<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgResturentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgResturent', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->text('details');
            $table->integer('Resturnt_id')->unsigned();;
            $table->foreign('Resturnt_id')->references('id')->on('bloggers')->onDelete('cascade');
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
        Schema::dropIfExists('img_resturent');
    }
}
