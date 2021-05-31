<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTennantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tennants', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tennant',100);
            $table->integer('id_lantai');
            $table->integer('id_kategori');
            $table->integer('lebar');
            $table->integer('panjang');
            $table->string('gambar');
            $table->timestamps();
        });
        Schema::table('lantai',function($table)
        {
           $table->foreign('id_lantai')->references('id_lantai')->on('lantai')->onUpdate('cascade')->onDelete('cascade'); 

        });
         Schema::table('kategoris',function($table)
        {
           $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onUpdate('cascade')->onDelete('cascade'); 
           
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tennants');
    }
}
