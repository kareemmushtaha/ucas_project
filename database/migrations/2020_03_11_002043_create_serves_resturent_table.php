<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServesResturentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serves_resturent', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serves_name');
            $table->integer('Resturnt_id')->unsigned();
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
        Schema::dropIfExists('serves_resturent');
    }
}
