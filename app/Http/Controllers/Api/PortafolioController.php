<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Technology;
use App\Models\Project;
use App\Models\Experience;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $technologies = Technology::orderBy('order')->orderBy('name')->get();
        $projects = Project::orderBy('featured', 'desc')
                          ->orderBy('order')
                          ->orderBy('created_at', 'desc')
                          ->get();
        $experiences = Experience::orderBy('order')->orderBy('created_at', 'desc')->get();

        return response()->json([
            'data' => [
                'profile' => $profile,
                'technologies' => $technologies,
                'projects' => $projects,
                'experience' => $experiences,
            ]
        ]);
    }
}