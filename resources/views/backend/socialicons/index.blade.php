@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Social Icons</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('socialicon.create') }}" class="btn btn-primary float-sm-right">Create Social Icon</a>
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
            <h3 class="card-title">List of Social Icons</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Icon Name</th>
                  <th>URL</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($socialIcons as $socialIcon)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $socialIcon->social_icon_name }}</td>
                    <td><a href="{{ $socialIcon->social_icon_url }}" target="_blank">{{ $socialIcon->social_icon_url }}</a></td>
                    <td>
                      <a href="{{ route('socialicon.edit', $socialIcon->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('socialicon.destroy', $socialIcon->id) }}" method="POST" style="display:inline-block;">
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
            {{ $socialIcons->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
