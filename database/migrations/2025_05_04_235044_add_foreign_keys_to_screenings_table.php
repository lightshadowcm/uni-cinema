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
        Schema::table('screenings', function (Blueprint $table) {
            $table->foreign(['movie_id'], 'screenings_movie_id_fkey')->references(['id'])->on('movies')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['room_id'], 'screenings_room_id_fkey')->references(['id'])->on('rooms')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('screenings', function (Blueprint $table) {
            $table->dropForeign('screenings_movie_id_fkey');
            $table->dropForeign('screenings_room_id_fkey');
        });
    }
};
