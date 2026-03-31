<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * GET /api/tasks
     * Retourne la liste de toutes les tâches (les plus récentes en premier).
     * Statut de réponse : 200 OK
     */
    public function index()
    {
        //$tasks = Task::latest()->paginate(5); // 5 taches par page

        $tasks = Task::latest()->get();

        // La collection Eloquent est automatiquement convertie en JSON valide
        return TaskResource::collection($tasks); 
    }

    /**
     * POST /api/tasks
     * Crée une nouvelle tâche après validation des données.
     * Statut de réponse : 201 Created (si succès) | 422 (si validation échoue)
     */
    public function store(StoreTaskRequest $request)
    {
        // $request->validated() = uniquement les données qui ont passé les règles
        $task = Task::create($request->validated());

        return new TaskResource($task);
    }

    /**
     * GET /api/tasks/{id}
     * Retourne les détails d'une tâche spécifique.
     * Laravel injecte automatiquement l'objet Task via le "Route Model Binding".
     * Si l'ID n'existe pas → 404 Not Found automatique.
     * Statut de réponse : 200 OK
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * PUT /api/tasks/{id}
     * Modifie une tâche de la base de données.
     * Statut de réponse : 200 OK | 422 (si validation echoue)
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        // $request->validated() = uniquement les données qui ont passer les règles
        $task->update($request->validated());

        return new TaskResource($task);
    }

    /**
     * DELETE /api/tasks/{id}
     * Supprime une tâche de la base de données.
     * Statut de réponse : 200 OK
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Tâche supprimée avec succès.'
        ], 200);
    }
}