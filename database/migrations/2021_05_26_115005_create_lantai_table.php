<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLantaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lantai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lantai');
            $table->timestamps();
        });
 Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->timestamps();
        });

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

         Schema::create('penyewa', function (Blueprint $table) {
            $table->id();
          $table->string('nama_pemilik',100);
            $table->string('alamat_pemilik',255);
            $table->string('hp',20);
            $table->string('email',100);
            $table->string('ktp',100);
            $table->string('nama_usaha',100);
            $table->string('alamat_usaha',100);
            $table->string('no_siup',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lantai');
    }
}
