<?php
// Author: Vincent A. Arcila
// Date: September 21, 2021

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'reviews', function (Blueprint $table) {
                $table->bigIncrements('id')->onDelete('cascade');
                $table->float('rating');
                $table->text('comment');
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('course_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
