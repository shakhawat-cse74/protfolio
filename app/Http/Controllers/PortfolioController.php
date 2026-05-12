<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $info = \App\Models\PersonalInfo::first();
        $skills = \App\Models\Skill::all();
        $projects = \App\Models\Project::all();
        $experiences = \App\Models\Experience::all();
        $services = \App\Models\Service::all();
        $settings = \App\Models\Setting::pluck('value', 'key');

        return view('welcome', compact('info', 'skills', 'projects', 'experiences', 'services', 'settings'));
    }
}
