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
        Schema::create('bloglar', function (Blueprint $table) {
            $table->id();
            $table->string('blogBaslik');
            $table->text('blogIcerik');
            $table->timestamp('yayinTarihi')->useCurrent();
            $table->bigInteger('kullaniciId')->unsigned();
            $table->foreign('kullaniciId')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('kategoriId')->unsigned();
            $table->foreign('kategoriId')->references('id')->on('kategoriler')->onDelete('cascade');
            $table->boolean('aktif')->default(true);
            $table->string('etiketler');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloglar');
    }
};
