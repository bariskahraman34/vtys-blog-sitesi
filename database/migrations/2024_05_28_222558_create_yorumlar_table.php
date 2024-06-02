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
        Schema::create('yorumlar', function (Blueprint $table) {
            $table->id();
            $table->string('yorumBaslik');
            $table->text('yorumIcerik');
            $table->timestamp('yorumTarihi')->useCurrent();
            $table->bigInteger('kullaniciId')->unsigned();
            $table->foreign('kullaniciId')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('blogId')->unsigned();
            $table->foreign('blogId')->references('id')->on('bloglar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yorumlar');
    }
};
