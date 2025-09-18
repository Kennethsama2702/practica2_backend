<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('order')->orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'data' => $experiences
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $experience = Experience::create($request->all());

        return response()->json([
            'message' => 'Experiencia creada exitosamente',
            'data' => $experience
        ], 201);
    }

    public function show(Experience $experience)
    {
        return response()->json([
            'data' => $experience
        ]);
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $experience->update($request->all());

        return response()->json([
            'message' => 'Experiencia actualizada exitosamente',
            'data' => $experience
        ]);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return response()->json([
            'message' => 'Experiencia eliminada exitosamente'
        ]);
    }
}