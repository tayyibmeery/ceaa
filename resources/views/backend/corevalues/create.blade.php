@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($coreValue) ? 'Edit Core Value' : 'Create Core Value' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('corevalues.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($coreValue) ? 'Edit Core Value' : 'Create Core Value' }}</li>
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
            <h3 class="card-title">{{ isset($coreValue) ? 'Edit Core Value' : 'Create Core Value' }}</h3>
          </div>
          <!-- form start -->
          <form
            action="{{ isset($coreValue) ? route('corevalues.update', $coreValue->id) : route('corevalues.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($coreValue))
                @method('PUT')
            @endif

            <div class="card-body">
              <div class="form-group">
                <label for="heading">Heading</label>
                <input
                  type="text"
                  class="form-control"
                  id="heading"
                  name="heading"
                  placeholder="Enter heading"
                  value="{{ old('heading', $coreValue->heading ?? '') }}"
                  required>
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="summernote" name="description">
                  {{ old('description', $coreValue->description ?? 'Place <em>some</em> <u>text</u> <strong>here</strong>.') }}
                </textarea>
              </div>

              <div class="form-group">
                <label for="image">Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  name="image">
                @if (isset($coreValue) && $coreValue->image)
                  <div class="mt-2">
                    <img src="{{ asset($coreValue->image) }}" alt="Core Value Image" width="150">
                  </div>
                @endif
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($coreValue) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
  $(document).ready(function () {
    $('#summernote').summernote({
      height: 200, // set editor height
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  });
</script>
@endsection
