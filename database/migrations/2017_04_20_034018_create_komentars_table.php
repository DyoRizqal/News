<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('komentar_id');
            $table->integer('komentar_berita_id')->unsigned();
            $table->string('komentar_email')->nullable();
            $table->string('komentar_website')->nullable();
            $table->text('komentar_isi');
            $table->enum('komentar_status', ['Aktif', 'Tidak Aktif']);
            $table->datetime('komentar_tglinput');
            $table->timestamps();

            $table->foreign('komentar_berita_id')->references('berita_id')->on('beritas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
