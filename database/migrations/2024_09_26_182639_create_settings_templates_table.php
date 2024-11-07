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
        Schema::create('settings_templates', function (Blueprint $table) {
            $table->id();
            $table->string('sidebar_background');
            $table->string('sidebar_menu_background');
            $table->string('sidebar_menu_hover');
            $table->string('top_background');
            $table->string('content_background');
            $table->string('content_table_background');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings_templates');
    }
};
