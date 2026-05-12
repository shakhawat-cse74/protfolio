@extends('admin.layout')

@section('content')
<div class="header">
    <h1>Training & Certifications</h1>
    <p>Manage your professional trainings and certificates.</p>
</div>

<div class="card" style="margin-bottom: 2rem;">
    <h2>Add New Training</h2>
    <form action="{{ route('admin.trainings.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label>Training Title</label>
                <input type="text" name="title" class="form-control" placeholder="e.g. Web Development Bootcamp" required>
            </div>
            <div class="form-group">
                <label>Organization</label>
                <input type="text" name="organization" class="form-control" placeholder="e.g. Udemy / Coursera" required>
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" class="form-control" placeholder="e.g. 2023" required>
            </div>
            <div class="form-group">
                <label>Duration (Optional)</label>
                <input type="text" name="duration" class="form-control" placeholder="e.g. 6 Months">
            </div>
        </div>
        <button type="submit" class="btn-primary" style="margin-top: 1rem;">Add Training</button>
    </form>
</div>

<div class="card">
    <h2>Training List</h2>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
            <thead>
                <tr style="border-bottom: 1px solid var(--border); text-align: left;">
                    <th style="padding: 1rem;">Title</th>
                    <th style="padding: 1rem;">Organization</th>
                    <th style="padding: 1rem;">Year</th>
                    <th style="padding: 1rem;">Duration</th>
                    <th style="padding: 1rem; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trainings as $training)
                <tr style="border-bottom: 1px solid var(--border);">
                    <td style="padding: 1rem;">{{ $training->title }}</td>
                    <td style="padding: 1rem;">{{ $training->organization }}</td>
                    <td style="padding: 1rem;">{{ $training->year }}</td>
                    <td style="padding: 1rem;">{{ $training->duration }}</td>
                    <td style="padding: 1rem; text-align: right;">
                        <form action="{{ route('admin.trainings.destroy', $training->id) }}" method="POST">
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
