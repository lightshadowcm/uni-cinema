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
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign(['screening_id'], 'tickets_screening_id_fkey')->references(['id'])->on('screenings')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'], 'tickets_user_id_fkey')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_screening_id_fkey');
            $table->dropForeign('tickets_user_id_fkey');
        });
    }
};
