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
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('founded_year')->nullable();
            $table->text('quote_text')->nullable();
            $table->text('sejarah_subtitle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['hero_title', 'hero_subtitle', 'founded_year', 'quote_text', 'sejarah_subtitle']);
        });
    }
};
