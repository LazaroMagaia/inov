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
        Schema::create('origin_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groups_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('origem_clientes_id')->constrained('origem_clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origin_groups');
    }
};
