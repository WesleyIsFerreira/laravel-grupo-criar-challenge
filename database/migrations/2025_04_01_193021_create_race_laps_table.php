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
        Schema::create('race_laps', function (Blueprint $table) {
            $table->id();
            $table->time('hora', 3);
            $table->string('piloto', 50);
            $table->integer('volta');
            $table->time('tempo', 3);
            $table->decimal('velocidade', 6, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_laps');
    }
};
