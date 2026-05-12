<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::latest()->get();
        return view('admin.training', compact('trainings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'organization' => 'required',
            'year' => 'required',
        ]);

        Training::create($request->all());
        return back()->with('success', 'Training added successfully');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return back()->with('success', 'Training deleted successfully');
    }
}
