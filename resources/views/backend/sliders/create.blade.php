@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($slider) ? 'Edit Slider' : 'Add Slider' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($slider) ? 'Edit Slider' : 'Add Slider' }}</li>
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
            <h3 class="card-title"><small>{{ isset($slider) ? 'Edit Slider Details' : 'Add Slider Details' }}</small></h3>
          </div>
          <form
            action="{{ isset($slider) ? route('slider.update', $slider->id) : route('slider.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($slider))
              @method('PUT')
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="welcome_text">Welcome Text</label>
                <input
                  type="text"
                  class="form-control"
                  id="welcome_text"
                  name="welcome_text"
                  placeholder="Enter Welcome Text"
                  value="{{ old('welcome_text', $slider->welcome_text ?? '') }}"
                  >
              </div>
              <div class="form-group">
                <label for="heading">Heading</label>
                <input
                  type="text"
                  class="form-control"
                  id="heading"
                  name="heading"
                  placeholder="Enter Heading"
                  value="{{ old('heading', $slider->heading ?? '') }}"
                  >
              </div>
              <div class="form-group">
                <label for="button_name">Button Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="button_name"
                  name="button_name"
                  placeholder="Enter Button Name"
                  value="{{ old('button_name', $slider->button_name ?? '') }}"
                  >
              </div>
              <div class="form-group">
                <label for="slider_image">Slider Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="slider_image"
                  name="slider_image"
                  {{ isset($slider) ? '' : 'required' }}>
                @if(isset($slider) && $slider->slider_image)
                  <img src="{{ asset($slider->slider_image) }}" alt="Slider Image" class="mt-3" width="200">
                @endif
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($slider) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
