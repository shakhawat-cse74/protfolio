@extends('admin.layout')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Manage Services</h1>
</div>

@if(session('success'))
    <div class="card" style="background: rgba(34, 197, 94, 0.2); border-color: #22c55e; color: #22c55e;">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Service Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn-primary">Add Service</button>
    </form>
</div>
@endsection
