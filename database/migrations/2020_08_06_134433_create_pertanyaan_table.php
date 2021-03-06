<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul', '45');
            $table->string('isi');
            $table->BigInteger('profile_id')->unsigned();
            // $table->BigInteger('jawaban_tepat_id')->unsigned();
            $table->timestamps();

            $table->foreign('profile_id')
                ->references('id')
                ->on('profile');
            // $table->foreign('jawaban_tepat_id')
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
        Schema::dropIfExists('pertanyaan');
    }
}
