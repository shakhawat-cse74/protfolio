@extends('admin.layout')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Edit Personal Information</h1>
    <p style="color: var(--text-muted);">This information will be displayed on your portfolio landing page.</p>
</div>

@if(session('success'))
    <div class="card" style="background: rgba(34, 197, 94, 0.2); border-color: #22c55e; color: #22c55e;">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.personal-info.store') }}" method="POST" enctype="multipart/form-data" class="card">
    @csrf
    <div class="form-group" style="margin-bottom: 2rem;">
        <label>Profile Picture</label>
        <input type="file" name="image" class="dropify" data-default-file="{{ $info->image ? asset('storage/' . $info->image) : '' }}">
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $info->name }}">
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" name="role" class="form-control" value="{{ $info->role }}">
        </div>
    </div>

    <div class="form-group">
        <label>Bio</label>
        <textarea name="bio" class="form-control" rows="4">{{ $info->bio }}</textarea>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $info->email }}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $info->phone }}">
        </div>
    </div>

    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="{{ $info->address }}">
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
        <div class="form-group">
            <label>GitHub URL</label>
            <input type="text" name="github" class="form-control" value="{{ $info->github }}">
        </div>
        <div class="form-group">
            <label>LinkedIn URL</label>
            <input type="text" name="linkedin" class="form-control" value="{{ $info->linkedin }}">
        </div>
    </div>

    <div style="margin-top: 1rem;">
        <button type="submit" class="btn-primary">Update Information</button>
    </div>
</form>
@endsection
