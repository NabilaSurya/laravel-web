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
        Schema::create('lokasi_aset', function (Blueprint $table) {
            $table->id('lokasi_id');
            $table->unsignedBigInteger('aset_id');
            $table->string('lokasi_text');
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('aset_id')
                ->references('aset_id')
                ->on('aset')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_aset');
    }
};
