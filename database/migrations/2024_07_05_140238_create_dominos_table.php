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
        Schema::create('dominos', function (Blueprint $table) {
            $table->id();
            $table->string('imei');
            $table->string('type');
            $table->string('date_achat');
            $table->string('operateur');
            $table->string('user');
            $table->string('etiquette');
            $table->string('remarque');
            $table->string('status');
            $table->string('service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dominos');
    }
};
