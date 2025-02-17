@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sliders</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Sliders</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sliders Table</h3>
            <a href="{{ route('slider.create') }}" class="btn btn-primary float-right">Add Slider</a>
          </div>
          <div class="card-body">
            <table id="slidersTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Welcome Text</th>
                  <th>Heading</th>
                  <th>Button Name</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sliders as $slider)
                  <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->welcome_text }}</td>
                    <td>{{ $slider->heading }}</td>
                    <td>{{ $slider->button_name }}</td>
                    <td>
                      <img src="{{ asset( $slider->slider_image) }}" alt="Slider Image" width="100">
                    </td>
                    <td>
                      <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
