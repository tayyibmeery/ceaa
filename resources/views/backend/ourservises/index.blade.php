@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Our Services</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('ourservices.create') }}" class="btn btn-primary float-sm-right">Create Service</a>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of Services</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Heading</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($services as $service)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->heading }}</td>
                    <td>{!! $service->description !!}</td>
                    <td>
                      <a href="{{ route('ourservices.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('ourservices.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
</section>

@endsection
