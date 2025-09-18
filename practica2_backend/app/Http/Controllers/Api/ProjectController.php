<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('featured', 'desc')
                          ->orderBy('order')
                          ->orderBy('created_at', 'desc')
                          ->get();
        
        return response()->json([
            'data' => $projects
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'technologies' => 'required|array',
            'technologies.*' => 'string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $project = Project::create($request->all());

        return response()->json([
            'message' => 'Proyecto creado exitosamente',
            'data' => $project
        ], 201);
    }

    public function show(Project $project)
    {
        return response()->json([
            'data' => $project
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'technologies' => 'required|array',
            'technologies.*' => 'string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $project->update($request->all());

        return response()->json([
            'message' => 'Proyecto actualizado exitosamente',
            'data' => $project
        ]);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json([
            'message' => 'Proyecto eliminado exitosamente'
        ]);
    }
}