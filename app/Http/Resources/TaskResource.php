<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transforme la tâche en tableau JSON.
     * Règle d'or : Ne jamais retourner la base de données brute au client.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'completed'   => $this->completed,
            'created_at'  => $this->created_at->format('d/m/Y H:i'),
            // Note : updated_at et les flags internes de la BDD ne sont PAS exposés
        ];
    }
}