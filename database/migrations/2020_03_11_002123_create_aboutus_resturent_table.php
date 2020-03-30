<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutusResturentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutus_resturent', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('aboutUs');
            $table->text('adress');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('telephon');
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
        Schema::dropIfExists('aboutus_resturent');
    }
}
