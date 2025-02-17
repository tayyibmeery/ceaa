@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($page) ? 'Edit Page' : 'Create Page' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($page) ? 'Edit Page' : 'Create Page' }}</li>
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
            <h3 class="card-title">{{ isset($page) ? 'Edit Page' : 'Create Page' }}</h3>
          </div>
          <!-- form start -->
          <form action="{{ isset($page) ? route('pages.update', $page->id) : route('pages.store') }}" method="POST">
            @csrf
            @if (isset($page))
                @method('PUT')
            @endif

            <div class="card-body">
              <!-- Page Name -->
              <div class="form-group">
                <label for="name">Page Name</label>
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="name"
                  name="name"
                  placeholder="Enter page name"
                  value="{{ old('name', $page->name ?? '') }}"
                  required>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Slug -->
              <div class="form-group">
                <label for="slug">Slug (URL)</label>
                <input
                  type="text"
                  class="form-control @error('slug') is-invalid @enderror"
                  id="slug"
                  name="slug"
                  placeholder="Enter page slug"
                  value="{{ old('slug', $page->slug ?? '') }}"
                >
                @error('slug')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Heading -->
              <div class="form-group">
                <label for="heading">Heading</label>
                <input
                  type="text"
                  class="form-control @error('heading') is-invalid @enderror"
                  id="heading"
                  name="heading"
                  placeholder="Enter page heading"
                  value="{{ old('heading', $page->heading ?? '') }}"
                  required>
                @error('heading')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Description -->
              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="summernote" name="description">{{ old('description', $page->description ?? '') }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($page) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

<script>
  // Automatically update slug based on page name
  document.getElementById('name').addEventListener('input', function() {
    const slugField = document.getElementById('slug');
    const nameValue = this.value;

    // Only update the slug field if it's empty or matches the auto-generated value
    if (!slugField.dataset.manualEdit) {
      slugField.value = nameValue.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
    }
  });

  // Mark slug as manually edited
  document.getElementById('slug').addEventListener('input', function() {
    this.dataset.manualEdit = true; // Mark as manually edited
  });
</script>

@endsection
