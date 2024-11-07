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
        Schema::table('origem_clientes', function (Blueprint $table) {
            $table->string('token')->nullable()->after('name');
            $table->string('slug')->nullable()->after('token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('origem_clientes', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->dropColumn('slug');
        });
    }
};
