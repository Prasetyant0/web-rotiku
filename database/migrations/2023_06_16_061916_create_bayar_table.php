<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stok');
            $table->integer('total_bayar');
            $table->unsignedBigInteger('id_roti');
            $table->text('alamat');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('id_roti')->references('id_roti')->on('roti')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bayar', function (Blueprint $table) {
        $table->dropForeign(['id_roti']);
        });
        
        Schema::dropIfExists('bayar');
    }
}
