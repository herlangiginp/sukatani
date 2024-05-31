<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('deskripsi_pendek')->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_normal', 8, 2);
            $table->decimal('harga_diskon', 8, 2)->nullable();
            $table->string('SKU');
            $table->enum('status_barang', ['ada', 'habis']);
            $table->text('alamattoko');
            $table->unsignedInteger('berat_barang')->default(1);
            $table->unsignedInteger('jumlah_barang')->default(10);
            $table->string('image');
            $table->text('images')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDeleted('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDeleted('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
