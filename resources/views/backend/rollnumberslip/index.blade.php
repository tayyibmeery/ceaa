@extends('backend.layout.main')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Roll Number Slips</h1>
    <a href="{{ route('rollnumber.exports') }}" class="btn btn-success float-right">
    <i class="fas fa-file-excel"></i> Export Roll Numbers
</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Roll Number</th>
                <th>Candidate Name</th>
                <th>CNIC</th>
                <th>Job Post</th>
                <th>Test Date</th>
                <th>Test Center</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rollNumbers as $roll)
            <tr>
                <td>{{ $roll->roll_number }}</td>
                <td>{{ $roll->application->user->full_name }}</td>
                <td>{{ $roll->application->user->cnic }}</td>
                <td>{{ $roll->application->jobPost->title }}</td>
                <td>{{ $roll->test->test_date ?? 'N/A' }}</td>
                <td>{{ $roll->test->test_center ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('rollnumber.show', $roll->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('rollnumber.print', $roll->id) }}" class="btn btn-warning btn-sm" target="_blank">Print</a>
                    <a href="{{ route('rollnumber.download', $roll->id) }}" class="btn btn-primary btn-sm">Download PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $rollNumbers->links() }}
</div>
@endsection
