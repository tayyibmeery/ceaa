@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($service) ? 'Edit Service' : 'Create Service' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('ourservices.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($service) ? 'Edit Service' : 'Create Service' }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ isset($service) ? 'Edit Service' : 'Create Service' }}</h3>
          </div>
          <form action="{{ isset($service) ? route('ourservices.update', $service->id) : route('ourservices.store') }}" method="POST">
            @csrf
            @if (isset($service))
                @method('PUT')
            @endif

            <div class="card-body">
              <div class="form-group">
                <label for="heading">Heading</label>
                <input type="text" class="form-control" id="heading" name="heading" placeholder="Enter heading" value="{{ old('heading', $service->heading ?? '') }}" required>
              </div>

               <div class="form-group">
                <label for="description">Description</label>
                <textarea id="summernote" name="description">{{ old('description', $service->description ?? '') }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($service) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
