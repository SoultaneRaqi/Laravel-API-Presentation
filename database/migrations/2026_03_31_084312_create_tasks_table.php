<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Creer la table "tasks".
     *
     * Colonnes :
     * - id          : Clé primaire auto-incrémentée
     * - title       : Titre de la tâche (obligatoire)
     * - description : Description détaillée (optionnelle)
     * - completed   : Statut d'achèvement (false par défaut)
     * - timestamps  : created_at & updated_at (gérés automatiquement par Laravel)
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Annuler la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};