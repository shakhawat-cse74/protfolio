@extends('admin.layout')

@section('content')
<div class="header">
    <h1>Education</h1>
    <p>Manage your academic qualifications.</p>
</div>

<div class="card" style="margin-bottom: 2rem;">
    <h2>Add New Education</h2>
    <form action="{{ route('admin.education.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label>Degree / Certificate</label>
                <input type="text" name="degree" class="form-control" placeholder="e.g. B.Sc in CSE" required>
            </div>
            <div class="form-group">
                <label>Institution</label>
                <input type="text" name="institution" class="form-control" placeholder="e.g. University of Dhaka" required>
            </div>
            <div class="form-group">
                <label>Passing Year</label>
                <input type="text" name="year" class="form-control" placeholder="e.g. 2022" required>
            </div>
            <div class="form-group">
                <label>Result (Optional)</label>
                <input type="text" name="result" class="form-control" placeholder="e.g. GPA 4.00">
            </div>
        </div>
        <button type="submit" class="btn-primary" style="margin-top: 1rem;">Add Education</button>
    </form>
</div>

<div class="card">
    <h2>Education List</h2>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
            <thead>
                <tr style="border-bottom: 1px solid var(--border); text-align: left;">
                    <th style="padding: 1rem;">Degree</th>
                    <th style="padding: 1rem;">Institution</th>
                    <th style="padding: 1rem;">Year</th>
                    <th style="padding: 1rem;">Result</th>
                    <th style="padding: 1rem; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($educations as $edu)
                <tr style="border-bottom: 1px solid var(--border);">
                    <td style="padding: 1rem;">{{ $edu->degree }}</td>
                    <td style="padding: 1rem;">{{ $edu->institution }}</td>
                    <td style="padding: 1rem;">{{ $edu->year }}</td>
                    <td style="padding: 1rem;">{{ $edu->result }}</td>
                    <td style="padding: 1rem; text-align: right;">
                        <form action="{{ route('admin.education.destroy', $edu->id) }}" method="POST">
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
