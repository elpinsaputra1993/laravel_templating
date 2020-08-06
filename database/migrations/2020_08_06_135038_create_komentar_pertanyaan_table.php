<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarPertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isi');
            $table->BigInteger('profile_id')->unsigned();
            // $table->BigInteger('pertanyaan_id')->unsigned();
            $table->timestamps();

            $table->foreign('profile_id')
                ->references('id')
                ->on('profile');
            // $table->foreign('pertanyaan_id')
            //     ->references('id')
            //     ->on('pertanyaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_pertanyaan');
    }
}
