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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('categorie');
            $table->string('designation')->nullable();
            $table->string('num_serie')->nullable();
            $table->string('date_achat')->nullable();
            $table->string('status')->nullable();
            $table->string('usager')->nullable();
            $table->string('etiquette')->nullable();
            $table->text('remarque')->nullable();
            $table->string('services')->nullable();
            $table->string('emplacement')->nullable();
            $table->string('type')->nullable();
            $table->string('operateur')->nullable();
            $table->string('mac')->nullable();
            $table->string('ip')->nullable();
            $table->string('user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};
