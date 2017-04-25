  <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('kategori_id');
            $table->string('kategori_nama');
            $table->enum('kategori_status', ['Aktif', 'Tidak Aktif']);
            $table->datetime('kategori_tglinput');
            $table->string('kategori_userinput');
            $table->timestamps();

            $table->foreign('kategori_userinput')->references('user_name')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
}
