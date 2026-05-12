@extends('admin.layout')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Manage Projects</h1>
    <p style="color: var(--text-muted);">Showcase your best work.</p>
</div>

@if(session('success'))
    <div class="card" style="background: rgba(34, 197, 94, 0.2); border-color: #22c55e; color: #22c55e;">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <h3>Add New Project</h3>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Project Image</label>
                <input type="file" name="image" class="dropify" data-height="150">
            </div>
            <div>
                <div class="form-group">
                    <label>Project Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tech Stack</label>
                    <input type="text" name="tech_stack" class="form-control" placeholder="e.g. Laravel, React, Tailwind">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Demo URL</label>
                <input type="text" name="demo_url" class="form-control">
            </div>
            <div class="form-group">
                <label>Repo URL</label>
                <input type="text" name="repo_url" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn-primary">Add Project</button>
    </form>
</div>

<div class="card" style="margin-top: 2rem;">
    <h3>Existing Projects</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 1rem;">
        @foreach($projects as $project)
        <div style="border: 1px solid var(--border); border-radius: 0.5rem; overflow: hidden; background: rgba(255,255,255,0.02);">
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" style="width: 100%; height: 150px; object-fit: cover; border-bottom: 1px solid var(--border);">
            @endif
            <div style="padding: 1rem;">
                <h4 style="margin: 0 0 0.5rem 0;">{{ $project->title }}</h4>
                <p style="color: var(--text-muted); font-size: 0.875rem;">{{ Str::limit($project->description, 100) }}</p>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                    <span style="font-size: 0.75rem; background: rgba(99, 102, 241, 0.2); color: var(--primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem;">{{ $project->tech_stack }}</span>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer;">
                            <i data-lucide="trash-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
