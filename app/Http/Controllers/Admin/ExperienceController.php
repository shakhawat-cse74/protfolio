<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experiences', compact('experiences'));
    }

    public function store(Request $request)
    {
        Experience::create($request->all());
        return redirect()->back()->with('success', 'Experience added successfully');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->back()->with('success', 'Experience deleted successfully');
    }
}
