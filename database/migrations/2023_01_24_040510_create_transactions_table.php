<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 

     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('invoice_number')->unique();
        $table->unsignedBigInteger('user_id');
        $table->integer('total_price');
        $table->string('status')->default('PENDING');
        $table->string('bukti_pembayaran')->nullable();
        $table->string('metode_pembayaran');
        $table->string('alamat_pengiriman');
        $table->string('no_hp');
        $table->string('nama_pembeli');
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users');
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
