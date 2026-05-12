@extends('admin.layout')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Welcome back, Admin</h1>
    <p style="color: var(--text-muted);">Manage your portfolio content dynamically.</p>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
    <div class="card">
        <h3 style="margin: 0; color: var(--primary);">{{ \App\Models\Project::count() }}</h3>
        <p style="margin: 0.5rem 0 0; color: var(--text-muted);">Projects</p>
    </div>
    <div class="card">
        <h3 style="margin: 0; color: var(--primary);">{{ \App\Models\Skill::count() }}</h3>
        <p style="margin: 0.5rem 0 0; color: var(--text-muted);">Skills</p>
    </div>
    <div class="card">
        <h3 style="margin: 0; color: var(--primary);">{{ \App\Models\Experience::count() }}</h3>
        <p style="margin: 0.5rem 0 0; color: var(--text-muted);">Experiences</p>
    </div>
    <div class="card">
        <h3 style="margin: 0; color: var(--primary);">{{ \App\Models\Service::count() }}</h3>
        <p style="margin: 0.5rem 0 0; color: var(--text-muted);">Services</p>
    </div>
</div>

<div class="card" style="margin-top: 2rem;">
    <h2>Quick Actions</h2>
    <div style="display: flex; gap: 1rem;">
        <a href="{{ route('admin.projects.index') }}" class="btn-primary" style="text-decoration: none;">Add New Project</a>
        <a href="{{ route('admin.personal-info.index') }}" class="btn-primary" style="text-decoration: none; background: rgba(255,255,255,0.1);">Edit Profile</a>
    </div>
</div>
@endsection
