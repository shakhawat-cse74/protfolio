@extends('admin.layout')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Manage Experience</h1>
</div>

@if(session('success'))
    <div class="card" style="background: rgba(34, 197, 94, 0.2); border-color: #22c55e; color: #22c55e;">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <form action="{{ route('admin.experiences.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Role</label>
                <input type="text" name="role" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" placeholder="e.g. 2020 - 2022">
        </div>
        <button type="submit" class="btn-primary">Add Experience</button>
    </form>
</div>
@endsection
