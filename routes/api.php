<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tasks API - Routes
|--------------------------------------------------------------------------
|
| Architecture REST de notre Tasks API :
|
| GET    /api/tasks        → Liste toutes les tâches
| POST   /api/tasks        → Creer une nouvelle tâche
| GET    /api/tasks/{id}   → Voir une tache specifique
| PUT    /api/tasks/{id}   → Modifier une tache completement
| PATCH  /api/tasks/{id}   → Modifier une tache partiellement
| DELETE /api/tasks/{id}   → Supprimer une tache
|
| Note : Le préfixe /api est ajoute automatiquement par Laravel.
|
*/

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{task}', [TaskController::class, 'show']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::patch('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);