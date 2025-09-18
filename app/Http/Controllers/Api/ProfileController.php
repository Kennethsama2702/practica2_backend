<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Profile::first();
        
        if (!$profile) {
            return response()->json([
                'message' => 'Perfil no encontrado'
            ], 404);
        }

        return response()->json([
            'data' => $profile
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'location' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'avatar' => 'nullable|string',
            'github_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'cv_url' => 'nullable|url',
        ]);

        $profile = Profile::first();
        
        if (!$profile) {
            $profile = Profile::create($request->all());
        } else {
            $profile->update($request->all());
        }

        return response()->json([
            'message' => 'Perfil actualizado exitosamente',
            'data' => $profile
        ]);
    }
}