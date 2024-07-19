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
        Schema::create('projecteurs', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('num_serie');
            $table->string('date_achat');
            $table->string('user');

            $table->string('etiquette');
            $table->string('remarque');
            $table->string('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projecteurs');
    }
};
