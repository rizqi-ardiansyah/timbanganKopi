<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKopiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kopi', function (Blueprint $table) {
            $table->id();
            $table->string('pekerja_id');
            $table->foreign('pekerja_id')->references('id_pekerja')->on('tbl_pekerja');
            $table->double('berat');
            $table->date('tgl_menimbang');
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
        Schema::dropIfExists('tbl_kopi');
    }
}
