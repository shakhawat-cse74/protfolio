<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function index()
    {
        $info = \App\Models\PersonalInfo::first() ?? new \App\Models\PersonalInfo();
        return view('admin.personal-info', compact('info'));
    }

    public function store(Request $request)
    {
        $info = \App\Models\PersonalInfo::first() ?? new \App\Models\PersonalInfo();
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('personal', 'public');
        }

        $info->fill($data);
        $info->save();

        return redirect()->back()->with('success', 'Info updated successfully');
    }
}
