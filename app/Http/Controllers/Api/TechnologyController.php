<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('order')->orderBy('name')->get();
        
        return response()->json([
            'data' => $technologies
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
            'category' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $technology = Technology::create($request->all());

        return response()->json([
            'message' => 'Tecnología creada exitosamente',
            'data' => $technology
        ], 201);
    }

    public function show(Technology $technology)
    {
        return response()->json([
            'data' => $technology
        ]);
    }

    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
            'category' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $technology->update($request->all());

        return response()->json([
            'message' => 'Tecnología actualizada exitosamente',
            'data' => $technology
        ]);
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();

        return response()->json([
            'message' => 'Tecnología eliminada exitosamente'
        ]);
    }
}