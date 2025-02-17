@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Upload & Export Results</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('results.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Upload & Export Results</li>
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
            <h3 class="card-title">Upload & Export Results</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('results.upload') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="file">Upload Excel File</label>
                <input type="file" name="file" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            <hr>
            <a href="{{ route('results.export') }}" class="btn btn-success">Export Results</a>
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
