<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->increments('id');
            $table->engine = 'InnoDB';
            // $table->string('user_name')->index();
            $table->string('user_name')->primary();
            $table->string('user_pass');
            $table->string('user_namalengkap');
            $table->string('user_email')->unique();
            $table->enum('user_status', ['Aktif', 'Tidak Aktif']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
