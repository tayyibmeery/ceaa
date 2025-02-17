<!-- resources/views/pages/index.blade.php -->

@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pages</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('pages.create') }}" class="btn btn-primary float-sm-right">Create Page</a>
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
            <h3 class="card-title">List of Pages</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Page Name</th>
                  <th>Slug</th>
                  <th>Heading</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pages as $page)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->heading }}</td>
                    <td>{!! $page->description!!}</td>
                    <td>
                      <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline-block;">
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
            {{-- {{ $pages->links() }} --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
