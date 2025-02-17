@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>About Icons</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('abouticon.create') }}" class="btn btn-primary float-sm-right">Create About Icon</a>
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
            <h3 class="card-title">List of About Icons</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Icon Name</th>
                  <th>Details</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($aboutIcons as $aboutIcon)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $aboutIcon->about_icon_name }}</td>
                    <td>{!! $aboutIcon->about_icon_detail !!}</td>
                    <td>
                      <a href="{{ route('abouticon.edit', $aboutIcon->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('abouticon.destroy', $aboutIcon->id) }}" method="POST" style="display:inline-block;">
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
            {{ $aboutIcons->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
