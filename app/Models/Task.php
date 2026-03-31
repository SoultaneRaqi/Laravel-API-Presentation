<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Les champs autorisés à être remplis en masse (protection Mass Assignment).
     */
    protected $fillable = [
        'title',
        'description',
        'completed',
    ];

    /**
     * Conversion automatique des types PHP.
     */
    protected $casts = [
        'completed' => 'boolean',
    ];
}