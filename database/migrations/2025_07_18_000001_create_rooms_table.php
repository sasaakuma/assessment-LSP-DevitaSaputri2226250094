<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kamar');
            $table->string('tipe'); // Standard, Deluxe, Suite, Executive
            $table->unsignedInteger('harga_per_malam');
            $table->unsignedInteger('kapasitas')->default(2);
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable(); // path relatif ke storage/public
            $table->unsignedInteger('stok')->default(1); // jumlah kamar tersedia dengan tipe ini
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
