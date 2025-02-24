{{-- @extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Applications</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
<li class="breadcrumb-item active">Applications</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applications Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="applicationsTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>user Name</th>
                                    <th>Job Post</th>
                                    <th>Status</th>
                                    <th>Application Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->user->name }}</td>
                                    <td>{{ $application->jobPost->title }}</td>
                                    <td>
                                        <span class="badge
                        {{ $application->status == 'applied' ? 'badge-primary' : '' }}
                        {{ $application->status == 'test_scheduled' ? 'badge-info' : '' }}
                        {{ $application->status == 'test_completed' ? 'badge-warning' : '' }}
                        {{ $application->status == 'result_generated' ? 'badge-success' : '' }}
                      ">
                                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ $application->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('applications.show', $application->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>

@endsection --}}












{{--


@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Applications</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
<li class="breadcrumb-item active">Applications</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applications Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="applicationsTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>user Name</th>
                                    <th>CNIC</th>
                                    <th>Gender</th>
                                    <th>Job Post</th>
                                    <th>Status</th>
                                    <th>Application Date</th>
                                    <th>Highest Qualification</th>
                                    <th>Fees Receipt</th>
                                    <th>Reviewer Remarks</th>
                                    <th>Payment Status</th>
                                    <th>Advertisement Date</th>
                                    <th>Application Deadline</th>
                                    <th>Date of Birth</th>
                                    <th>Profile Picture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->user->name ?? 'N/A' }}</td>
                                    <td>{{ $application->user->cnic ?? 'N/A' }}</td>
                                    <td>{{ $application->user->gender ?? 'N/A' }}</td>
                                    <td>{{ $application->jobPost->title ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge
                        {{ $application->status == 'applied' ? 'badge-primary' : '' }}
                        {{ $application->status == 'test_scheduled' ? 'badge-info' : '' }}
                        {{ $application->status == 'test_completed' ? 'badge-warning' : '' }}
                        {{ $application->status == 'result_generated' ? 'badge-success' : '' }}
                      ">
                                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ $application->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $application->highest_qualification ?? 'N/A' }}</td>
                                    <td>{{ $application->fees_receipt ?? 'N/A' }}</td>
                                    <td>{{ $application->reviewer_remarks ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge
                        {{ $application->payment_status == 'pending' ? 'badge-warning' : '' }}
                        {{ $application->payment_status == 'paid' ? 'badge-success' : '' }}
                        {{ $application->payment_status == 'failed' ? 'badge-danger' : '' }}
                      ">
                                            {{ ucfirst($application->payment_status) }}
                                        </span>
                                    </td>
                                    <td>{{ $application->jobPost->advertisement_date ? \Carbon\Carbon::parse($application->jobPost->advertisement_date)->format('d-m-Y') : 'N/A' }}</td>
                                    <td>{{ $application->jobPost->application_deadline ? \Carbon\Carbon::parse($application->jobPost->application_deadline)->format('d-m-Y') : 'N/A' }}</td>
                                    <td>{{ $application->user->date_of_birth ? \Carbon\Carbon::parse($application->user->date_of_birth)->format('d-m-Y') : 'N/A' }}</td>
                                    <td>
                                        @if ($application->user->profile_picture)
                                        <img src="{{ asset($application->user->profile_picture) }}" alt="Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('applications.show', $application->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>

@endsection

--}}









@extends('backend.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Applications</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Applications</li>
                </ol>
            </div>
        </div>
    </div>
</section>

{{-- <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applications Table</h3>
                    </div>
                      <div class="col-sm-12 text-right">
            <a href="{{ route('applications.export') }}" class="btn btn-success">Export to Excel</a>
</div>
<!-- /.card-header -->
<div class="card-body">
    <div class="table-responsive">
        <table id="applicationsTable" class="table table-bordered table-hover" style="font-size: 12px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>user Name</th>
                    <th>CNIC</th>
                    <th>Gender</th>
                    <th>Job Post</th>
                    <th>Status</th>
                    <th>Application Date</th>
                    <th>Highest Qualification</th>
                    <th>Reviewer Remarks</th>
                    <th>Payment Status</th>
                    <th>Advertisement Date</th>
                    <th>Application Deadline</th>
                    <th>Date of Birth</th>
                    <th>Profile Picture</th>
                    <th>Fees Receipt</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->user->name ?? 'N/A' }}</td>
                    <td>{{ $application->user->cnic ?? 'N/A' }}</td>
                    <td>{{ $application->user->gender ?? 'N/A' }}</td>
                    <td>{{ $application->jobPost->title ?? 'N/A' }}</td>
                    <td>
                        <span class="badge
                        {{ $application->status == 'applied' ? 'badge-primary' : '' }}
                        {{ $application->status == 'test_scheduled' ? 'badge-info' : '' }}
                        {{ $application->status == 'test_completed' ? 'badge-warning' : '' }}
                        {{ $application->status == 'result_generated' ? 'badge-success' : '' }}
                      ">
                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                        </span>
                    </td>
                    <td>{{ $application->created_at->format('d-m-Y') }}</td>
                    <td>{{ $application->highest_qualification ?? 'N/A' }}</td>


                    <td>{{ $application->reviewer_remarks ?? 'N/A' }}</td>
                    <td>
                        <span class="badge
                        {{ $application->payment_status == 'pending' ? 'badge-warning' : '' }}
                        {{ $application->payment_status == 'paid' ? 'badge-success' : '' }}
                        {{ $application->payment_status == 'failed' ? 'badge-danger' : '' }}
                      ">
                            {{ ucfirst($application->payment_status) }}
                        </span>
                    </td>
                    <td>{{ $application->jobPost->advertisement_date ? \Carbon\Carbon::parse($application->jobPost->advertisement_date)->format('d-m-Y') : 'N/A' }}</td>
                    <td>{{ $application->jobPost->application_deadline ? \Carbon\Carbon::parse($application->jobPost->application_deadline)->format('d-m-Y') : 'N/A' }}</td>
                    <td>{{ $application->user->date_of_birth ? \Carbon\Carbon::parse($application->user->date_of_birth)->format('d-m-Y') : 'N/A' }}</td>
                    <td>
                        @if ($application->user->profile_picture)
                        <img src="{{ asset($application->user->profile_picture) }}" alt="Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        @if($application->fees_receipt)
                        @php
                        $fileExtension = pathinfo($application->fees_receipt, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                        <!-- Display Image -->
                        <img src="{{ asset($application->fees_receipt) }}" alt="Fees Receipt" style="width: 100px; height: auto; object-fit: cover;">
                        @elseif(strtolower($fileExtension) == 'pdf')
                        <!-- Display PDF Link -->
                        <a href="{{ asset($application->fees_receipt) }}" target="_blank" class="btn btn-info btn-sm">View PDF</a>
                        @else
                        <!-- Display the file name -->
                        <span>{{ $application->fees_receipt }}</span>
                        @endif
                        @else
                        N/A
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('applications.show', $application->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
</section> --}}



<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-md-12">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <!-- Job Post Filter -->
            <div class="col-sm-4">
                <form id="filterForm" method="GET" action="{{ route('applications.index') }}">
                    <select name="job_post_id" class="form-control" onchange="this.form.submit()">
                        <option value="">Select Job Post</option>
                        @foreach ($jobPosts as $jobPost)
                        <option value="{{ $jobPost->id }}" {{ request('job_post_id') == $jobPost->id ? 'selected' : '' }}>
                            {{ $jobPost->title }}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="col-sm-8 text-right">
                <a href="{{ route('applications.export', ['job_post_id' => request('job_post_id')]) }}" class="btn btn-success">Export to Excel</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applications Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="applicationsTable" class="table table-bordered table-hover" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>CNIC</th>
                                        {{-- <th>Gender</th> --}}
                                        <th>Job Post</th>
                                        <th>Status</th>
                                        <th>Application Date</th>
                                        {{-- <th>Highest Qualification</th> --}}
                                        <th>Reviewer Remarks</th>
                                        <th>Payment Status</th>
                                        {{-- <th>Advertisement Date</th> --}}
                                        <th>Application Deadline</th>
                                        {{-- <th>Date of Birth</th> --}}
                                        <th>Profile Picture</th>
                                        <th>Fees Receipt</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->user->FullName ?? 'N/A' }}</td>
                                        <td>{{ $application->user->cnic ?? 'N/A' }}</td>
                                        {{-- <td>{{ $application->user->gender ?? 'N/A' }}</td> --}}
                                        <td>{{ $application->jobPost->title ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge
                                                    {{ $application->status == 'applied' ? 'badge-primary' : '' }}
                                                    {{ $application->status == 'test_scheduled' ? 'badge-info' : '' }}
                                                    {{ $application->status == 'test_completed' ? 'badge-warning' : '' }}
                                                    {{ $application->status == 'result_generated' ? 'badge-success' : '' }}
                                                ">
                                                {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                            </span>
                                        </td>
                                        <td>{{ $application->created_at->format('d-m-Y') }}</td>
                                        {{-- <td>{{ $application->highest_qualification ?? 'N/A' }}</td> --}}
                                        <td>{{ $application->reviewer_remarks ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge
                                                    {{ $application->payment_status == 'pending' ? 'badge-warning' : '' }}
                                                    {{ $application->payment_status == 'paid' ? 'badge-success' : '' }}
                                                    {{ $application->payment_status == 'failed' ? 'badge-danger' : '' }}
                                                ">
                                                {{ ucfirst($application->payment_status) }}
                                            </span>
                                        </td>
                                        {{-- <td>{{ $application->jobPost->advertisement_date ? \Carbon\Carbon::parse($application->jobPost->advertisement_date)->format('d-m-Y') : 'N/A' }}</td> --}}
                                        <td>{{ $application->jobPost->application_deadline ? \Carbon\Carbon::parse($application->jobPost->application_deadline)->format('d-m-Y') : 'N/A' }}</td>
                                        {{-- <td>{{ $application->user->date_of_birth ? \Carbon\Carbon::parse($application->user->date_of_birth)->format('d-m-Y') : 'N/A' }}</td> --}}
                                        <td>
                                            @if ($application->user->profile_picture)
                                            <img src="{{ asset($application->user->profile_picture) }}" alt="Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        {{-- <td>
                                                @if($application->fees_receipt)
                                                    @php
                                                    $fileExtension = pathinfo($application->fees_receipt, PATHINFO_EXTENSION);
                                                    @endphp

                                                    @if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                                                        <img src="{{ asset($application->fees_receipt) }}" alt="Fees Receipt" style="width: 100px; height: auto; object-fit: cover;">
                                        @elseif(strtolower($fileExtension) == 'pdf')
                                        <a href="{{ asset($application->fees_receipt) }}" target="_blank" class="btn btn-info btn-sm">View PDF</a>
                                        @else
                                        <span>{{ $application->fees_receipt }}</span>
                                        @endif
                                        @else
                                        N/A
                                        @endif
                                        </td> --}}
                                        <td>
                                            @if($application->fees_receipt)
                                            @php
                                            $fileExtension = pathinfo($application->fees_receipt, PATHINFO_EXTENSION);
                                            @endphp

                                            @if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                                            <!-- Show image thumbnail and View button -->
                                            <img src="{{ asset($application->fees_receipt) }}" alt="Fees Receipt" style="width: 50px; height: 50px; object-fit: cover;">
                                            <button type="button" class="btn btn-primary btn-sm view-image" data-img="{{ asset($application->fees_receipt) }}">View</button>

                                            @elseif(strtolower($fileExtension) == 'pdf')
                                            <!-- Show PDF view button -->
                                            <a href="{{ asset($application->fees_receipt) }}" target="_blank" class="btn btn-info btn-sm">View </a>

                                            @else
                                            <span>{{ $application->fees_receipt }}</span>
                                            @endif
                                            @else
                                            N/A
                                            @endif
                                        </td>

                                        <td>
                                            {{-- <a href="{{ route('applications.show', $application->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                            <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal for viewing image -->
<div id="imageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Fees Receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Fees Receipt" style="max-width: 100%; max-height: 500px;">
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#applicationsTable').DataTable({
            "responsive": true
            , "autoWidth": false
            , "lengthChange": true
            , "pageLength": 10
        , });
    });

</script>


<script>
    $(document).ready(function() {
        // When the "View Image" button is clicked
        $('.view-image').on('click', function() {
            var imgSrc = $(this).data('img'); // Get the image source from data-img attribute

            // Set the image source to the modal
            $('#modalImage').attr('src', imgSrc);

            // Show the modal
            $('#imageModal').modal('show');
        });
    });

</script>
@endpush

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush




















{{-- @extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Applications</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
<li class="breadcrumb-item active">Applications</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applications Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>

@endsection --}}
