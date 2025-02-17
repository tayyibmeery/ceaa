@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($highlight) ? 'Edit Highlight' : 'Create Highlight' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('lights.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($highlight) ? 'Edit Highlight' : 'Create Highlight' }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Form Card -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ isset($highlight) ? 'Edit Highlight' : 'Create Highlight' }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
        <form
    action="{{ isset($highlight) ? route('lights.update', $highlight->id) : route('lights.store') }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    @if (isset($highlight))
        @method('PUT')
    @endif

            <div class="card-body">
              <div class="form-group">
                <label for="icon_name">Icon Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="icon_name"
                  name="icon_name"
                  placeholder="Enter icon name"
                  value="{{ old('icon_name', $highlight->icon_name ?? '') }}"
                  required>
              </div>
              <div class="form-group">
                <label for="icon_image">Icon Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="icon_image"
                  name="icon_image"
                  {{ isset($highlight) ? '' : 'required' }}>
                @if (isset($highlight))
                  <img src="{{ asset( $highlight->icon_image) }}" alt="Icon" width="100" height="100">
                @endif
              </div>
              <div class="form-group">
                <label for="title">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title"
                  placeholder="Enter title"
                  value="{{ old('title', $highlight->title ?? '') }}"
                  required>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($highlight) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

@endsection
