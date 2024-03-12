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
        Schema::table('paiements', function (Blueprint $table) {
            // Ajouter la colonne 'user_id' comme clé étrangère
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paiements', function (Blueprint $table) {
            // Supprimer la colonne 'user_id'
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};

