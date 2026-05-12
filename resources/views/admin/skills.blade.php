@extends('admin.layout')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Manage Skills</h1>
    <p style="color: var(--text-muted);">Add or remove skills from your portfolio.</p>
</div>

<div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.5rem;">
    <!-- Add Skill Form -->
    <form action="{{ route('admin.skills.store') }}" method="POST" class="card">
        @csrf
        <h3>Add New Skill</h3>
        <div class="form-group">
            <label>Skill Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" class="form-control" placeholder="Frontend, Backend, etc.">
        </div>
        <div class="form-group">
            <label>Percentage (0-100)</label>
            <input type="number" name="percentage" class="form-control" min="0" max="100" value="80">
        </div>
        <button type="submit" class="btn-primary" style="width: 100%;">Add Skill</button>
    </form>

    <!-- Skills List -->
    <div class="card">
        <h3>Existing Skills</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; color: var(--text-muted);">
                    <th style="padding: 1rem;">Skill</th>
                    <th style="padding: 1rem;">Category</th>
                    <th style="padding: 1rem;">Level</th>
                    <th style="padding: 1rem;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                <tr style="border-top: 1px solid var(--border);">
                    <td style="padding: 1rem;">{{ $skill->name }}</td>
                    <td style="padding: 1rem;">{{ $skill->category }}</td>
                    <td style="padding: 1rem;">{{ $skill->percentage }}%</td>
                    <td style="padding: 1rem;">
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" style="background: none; border: none; color: #ef4444; cursor: pointer;">
                                <i data-lucide="trash-2"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
