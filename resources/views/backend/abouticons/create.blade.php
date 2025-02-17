@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($aboutIcon) ? 'Edit About Icon' : 'Create About Icon' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('abouticon.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($aboutIcon) ? 'Edit About Icon' : 'Create About Icon' }}</li>
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
            <h3 class="card-title">{{ isset($aboutIcon) ? 'Edit About Icon' : 'Create About Icon' }}</h3>
          </div>
          <!-- form start -->
          <form
            action="{{ isset($aboutIcon) ? route('abouticon.update', $aboutIcon->id) : route('abouticon.store') }}"
            method="POST">
            @csrf
            @if (isset($aboutIcon))
                @method('PUT')
            @endif

            <div class="card-body">
              <div class="form-group">
                <label for="about_icon_name">Icon Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="about_icon_name"
                  name="about_icon_name"
                  placeholder="Enter icon name"
                  value="{{ old('about_icon_name', $aboutIcon->about_icon_name ?? '') }}"
                  required>
              </div>

              <div class="form-group">
                <label for="about_icon_detail">Details</label>
                 <textarea id="summernote"  name="about_icon_detail" >
{{ old('about_icon_name', $aboutIcon->about_icon_detail ?? '') }}
                        </textarea>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($aboutIcon) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

@endsection
