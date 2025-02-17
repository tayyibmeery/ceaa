@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Core Values</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('corevalues.create') }}" class="btn btn-primary float-sm-right">Create Core Value</a>
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
            <h3 class="card-title">List of Core Values</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Heading</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($coreValues as $coreValue)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $coreValue->heading }}</td>
                    <td>{!! Str::limit(strip_tags($coreValue->description), 50, '...') !!}</td>
                    <td>
                      @if ($coreValue->image)
                        <img src="{{ asset($coreValue->image) }}" alt="Core Value Image" width="70">
                      @else
                        <span>No Image</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('corevalues.edit', $coreValue->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('corevalues.destroy', $coreValue->id) }}" method="POST" style="display:inline-block;">
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
            {{-- {{ $coreValues->links() }} --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
