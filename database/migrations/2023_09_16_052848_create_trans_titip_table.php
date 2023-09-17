<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransTitipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_titip', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_kendaraan');
            $table->date('tgl_titip');
            $table->unsignedInteger('harga_sewa');
            $table->date('tgl_berakhir')->nullable();
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
        Schema::dropIfExists('trans_titip');
    }
}
