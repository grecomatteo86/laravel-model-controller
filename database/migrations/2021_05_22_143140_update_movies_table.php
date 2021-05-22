<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('cover_image')->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTE8zLTa7KyP0Q5WGiRnHYPaC5Uzihab097Ew&usqp=CAU');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
}
