@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Results</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('results.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Results</li>
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
            <h3 class="card-title">Results Table</h3>
            <a href="{{ route('results.create') }}" class="btn btn-primary float-right">Add Result</a>
            <span></span>
            <a href="{{ route('results.form') }}" class="mr-5 btn btn-primary float-right">Upload/Download result excel</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="resultsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Application ID</th>
                  <th>Marks Obtained</th>
                  <th>Total Marks</th>
                  <th>Remarks</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($results as $result)
                  <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->application_id }}</td>
                    <td>{{ $result->marks_obtained }}</td>
                    <td>{{ $result->total_marks }}</td>
                    <td>{{ $result->remarks }}</td>
                    <td>
                      <a href="{{ route('results.show', $result->id) }}" class="btn btn-info btn-sm">View</a>
                      <a href="{{ route('results.edit', $result->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('results.destroy', $result->id) }}" method="POST" style="display: inline;">
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
