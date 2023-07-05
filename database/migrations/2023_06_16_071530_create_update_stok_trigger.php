<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUpdateStokTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::unprepared('
         CREATE TRIGGER update_stok AFTER INSERT ON bayar
         FOR EACH ROW
         BEGIN
         UPDATE roti SET stok = stok - NEW.stok WHERE id_roti = NEW.id_roti;
         END
         ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::unprepared('DROP TRIGGER IF EXISTS update_stok');
    }
}
