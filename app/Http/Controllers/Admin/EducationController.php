<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::latest()->get();
        return view('admin.education', compact('educations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'degree' => 'required',
            'institution' => 'required',
            'year' => 'required',
        ]);

        Education::create($request->all());
        return back()->with('success', 'Education added successfully');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return back()->with('success', 'Education deleted successfully');
    }
}
