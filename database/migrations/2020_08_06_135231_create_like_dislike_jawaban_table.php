<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeDislikeJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislike_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('profile_id')->unsigned();
            // $table->BigInteger('jawaban_id')->unsigned();
            $table->integer('point', false, true);
            $table->timestamps();

            $table->foreign('profile_id')
                ->references('id')
                ->on('profile');
            // $table->foreign('jawaban_id')
            //     ->references('id')
            //     ->on('jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_dislike_jawaban');
    }
}
