<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRotiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roti', function (Blueprint $table) {
            $table->bigIncrements('id_roti');
            $table->string('roti');
            $table->text('description');
            $table->unsignedBigInteger('id_kategori');
            $table->string('gambar');
            $table->integer('harga');
            $table->integer('stok');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            // $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('roti', function (Blueprint $table) {
         $table->dropForeign(['id_kategori']);
         });

        Schema::dropIfExists('roti');
    }
}
