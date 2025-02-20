@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($trem) ? 'Edit trem' : 'Create trem' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('trems.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($trem) ? 'Edit trem' : 'Create trem' }}</li>
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
            <h3 class="card-title">{{ isset($trem) ? 'Edit trem' : 'Create trem' }}</h3>
          </div>
          <!-- form start -->
          <form action="{{ isset($trem) ? route('trems.update', $trem->id) : route('trems.store') }}" method="POST">
            @csrf
            @if (isset($trem))
                @method('PUT')
            @endif

            <div class="card-body">
              <!-- trem Name -->
              <div class="form-group">
                <label for="name">trem Name</label>
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="name"
                  name="name"
                  placeholder="Enter trem name"
                  value="{{ old('name', $trem->name ?? '') }}"
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
                  placeholder="Enter trem slug"
                  value="{{ old('slug', $trem->slug ?? '') }}"
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
                  placeholder="Enter trem heading"
                  value="{{ old('heading', $trem->heading ?? '') }}"
                  required>
                @error('heading')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Description -->
              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="summernote" name="description">{{ old('description', $trem->description ?? '') }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($trem) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

<script>
  // Automatically update slug based on trem name
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
