@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($socialIcon) ? 'Edit Social Icon' : 'Create Social Icon' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('socialicon.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($socialIcon) ? 'Edit Social Icon' : 'Create Social Icon' }}</li>
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
            <h3 class="card-title">{{ isset($socialIcon) ? 'Edit Social Icon' : 'Create Social Icon' }}</h3>
          </div>
          <!-- form start -->
          <form
            action="{{ isset($socialIcon) ? route('socialicon.update', $socialIcon->id) : route('socialicon.store') }}"
            method="POST">
            @csrf
            @if (isset($socialIcon))
                @method('PUT')
            @endif

            <div class="card-body">
              <div class="form-group">
                <label for="social_icon_name">Social Icon Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="social_icon_name"
                  name="social_icon_name"
                  placeholder="Enter icon name"
                  value="{{ old('social_icon_name', $socialIcon->social_icon_name ?? '') }}"
                  required>
              </div>

              <div class="form-group">
                <label for="social_icon_url">Social Icon URL</label>
                <input
                  type="url"
                  class="form-control"
                  id="social_icon_url"
                  name="social_icon_url"
                  placeholder="Enter icon URL"
                  value="{{ old('social_icon_url', $socialIcon->social_icon_url ?? '') }}"
                  required>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($socialIcon) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

@endsection
