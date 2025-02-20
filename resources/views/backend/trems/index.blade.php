<!-- resources/views/trems/index.blade.php -->

@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>trems</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('trems.create') }}" class="btn btn-primary float-sm-right">Create trem</a>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of trems</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>trem Name</th>
                  <th>Slug</th>
                  <th>Heading</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($trems as $trem)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trem->name }}</td>
                    <td>{{ $trem->slug }}</td>
                    <td>{{ $trem->heading }}</td>
                    <td>{!! $trem->description!!}</td>
                    <td>
                      <a href="{{ route('trems.edit', $trem->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('trems.destroy', $trem->id) }}" method="POST" style="display:inline-block;">
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
          <div class="card-footer">
            {{-- {{ $trems->links() }} --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
