@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Job Posts</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('job-posts.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Job Posts</li>
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
            <h3 class="card-title">Job Posts Table</h3>
            <a href="{{ route('job-posts.create') }}" class="btn btn-primary float-right">Create Job Post</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="jobPostsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Organization Name</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Requirements</th>
                  <th>Advertisement Date</th>
                  <th>Application Deadline</th>
                  <th>Advertisement File</th>
                  <th>Status</th>
                  <th>Visibility</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jobPosts as $jobPost)
                  <tr>
                    <td>{{ $jobPost->id }}</td>
                    <td>{{ $jobPost->organization_name }}</td>
                    <td>{{ $jobPost->title }}</td>
                    <td>{{ $jobPost->description }}</td>
                    <td>{{ $jobPost->requirements }}</td>
                    <td>{{ $jobPost->advertisement_date }}</td>
                    <td>{{ $jobPost->application_deadline }}</td>
                    <td>
                      @if($jobPost->advertisement_file)
                        <a href="{{ asset('storage/' . $jobPost->advertisement_file) }}" target="_blank">View File</a>
                      @else
                        No file uploaded
                      @endif
                    </td>
                    <td>{{ ucfirst($jobPost->status) }}</td>
                  <td>{{ $jobPost->is_visible ? 'Visible' : 'Hidden' }}</td>

                    <td>
                      <a href="{{ route('job-posts.show', $jobPost->id) }}" class="btn btn-info btn-sm">View</a>
                      <a href="{{ route('job-posts.edit', $jobPost->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('job-posts.destroy', $jobPost->id) }}" method="POST" style="display: inline;">
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
