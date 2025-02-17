{{-- @extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tests</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Tests</li>
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
            <h3 class="card-title">Tests Table</h3>
            <a href="{{ route('tests.create') }}" class="btn btn-primary float-right">Create Test</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="testsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Job Post</th>
                  <th>Test Date</th>
                  <th>Test Time</th>
                  <th>Test Center</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tests as $test)
                  <tr>
                    <td>{{ $test->id }}</td>
                    <td>{{ $test->jobPost->title }}</td>
                    <td>{{ $test->test_date->format('d-m-Y') }}</td>
                    <td>{{ $test->test_time }}</td>
                    <td>{{ $test->test_center }}</td>
                    <td>
                      <a href="{{ route('tests.show', $test->id) }}" class="btn btn-info btn-sm">View</a>
                      <a href="{{ route('tests.edit', $test->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('tests.destroy', $test->id) }}" method="POST" style="display: inline;">
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
@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tests</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('tests.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Tests</li>
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
            <h3 class="card-title">Tests Table</h3>
            <a href="{{ route('tests.create') }}" class="btn btn-primary float-right">Add Test</a>
          </div>

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
          <!-- /.card-header -->
          <div class="card-body">
            <table id="testsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Job Post</th>
                  <th>Test Date</th>
                  <th>Test Time</th>
                  <th>Test Center</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tests as $test)
                  <tr>
                    <td>{{ $test->id }}</td>
                    <td>{{ $test->jobPost->title }}</td>
                    <td>{{ $test->test_date }}</td>
                    <td>{{ $test->test_time }}</td>
                    <td>{{ $test->test_center }}</td>
                    <td>
                      <a href="{{ route('tests.show', $test->id) }}" class="btn btn-info btn-sm">View</a>
                      <a href="{{ route('tests.edit', $test->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('tests.destroy', $test->id) }}" method="POST" style="display: inline;">
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
