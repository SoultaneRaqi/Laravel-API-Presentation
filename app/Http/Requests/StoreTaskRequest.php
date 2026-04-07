<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Autoriser toutes les requêtes (auth à gérer plus tard avec Sanctum).
     * Sanctume is a stateless authentication middleware for Laravel used to protect your API routes.
     * EX: 
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation des données entrantes.
     * Si elles échouent → Laravel retourne automatiquement une erreur 422.
     */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255', // Obligatoire, texte, max 255 chars
            'description' => 'nullable|string',          // Optionnel, texte libre
            'completed'   => 'sometimes|boolean',        // Optionnel, doit être true/false
        ];
    }

    /**
     * Messages d'erreur personnalisés en français.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre de la tâche est obligatoire.',
            'title.max'      => 'Le titre ne peut pas dépasser 255 caractères.',
            'completed.boolean' => 'Le statut doit être vrai ou faux.',
        ];
    }
}