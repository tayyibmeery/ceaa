@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Roll Number Slips</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('roll-number-slips.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Roll Number Slips</li>
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
            <h3 class="card-title">Roll Number Slips Table</h3>
            <a href="{{ route('roll-number-slips.create') }}" class="btn btn-primary float-right">Add Roll Number Slip</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="rollNumberSlipsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Application ID</th>
                  <th>Test ID</th>
                  <th>Roll Number</th>
                  <th>Serial Number</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rollNumberSlips as $slip)
                  <tr>
                    <td>{{ $slip->id }}</td>
                    <td>{{ $slip->application_id }}</td>
                    <td>{{ $slip->test_id }}</td>
                    <td>{{ $slip->roll_number }}</td>
                    <td>{{ $slip->serial_number }}</td>
                    <td>
                      <a href="{{ route('roll-number-slips.show', $slip->id) }}" class="btn btn-info btn-sm">View</a>
                      <a href="{{ route('roll-number-slips.edit', $slip->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('roll-number-slips.destroy', $slip->id) }}" method="POST" style="display: inline;">
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
