<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBloggesrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bloggers', function (Blueprint $table) {

            $table->bigInteger('TypeOf_id')->unsigned()->default(1)->after('name');
            $table->foreign('TypeOf_id')->references('id')->on('type_Restaurant')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bloggers', function (Blueprint $table) {
            $table->dropForeign('TypeOf_id');
        });
    }
}
