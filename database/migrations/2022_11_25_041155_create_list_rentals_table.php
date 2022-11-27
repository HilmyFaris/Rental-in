<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_rentals', function (Blueprint $table) {
            $table->id();
            $table->string("nama_peminjam");
            $table->string("no_hp");
            $table->string("mobil_pinjam");
            $table->string("tanggal_pinjam");
            $table->string("tanggal_kembali");
            $table->string("total_bayar");
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
        Schema::dropIfExists('list_rentals');
    }
}
