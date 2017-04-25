<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('berita_id');
            $table->integer('berita_kategori_id')->unsigned();
            $table->string('berita_judul');
            $table->text('berita_detail');
            $table->enum('berita_utama', ['Ya', 'Tidak']);
            $table->string('berita_link');
            $table->integer('berita_view');
            $table->string('berita_userinput');
            $table->datetime('berita_tglinput');
            $table->enum('berita_status', ['Aktif', 'Tidak Aktif']);
            $table->timestamps();

            $table->foreign('berita_kategori_id')->references('kategori_id')->on('kategoris')->onDelete('cascade');
            $table->foreign('berita_userinput')->references('user_name')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
}
