@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($test) ? 'Edit Test' : 'Add Test' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('tests.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($test) ? 'Edit Test' : 'Add Test' }}</li>
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
            <h3 class="card-title">{{ isset($test) ? 'Edit Test Details' : 'Add Test Details' }}</h3>
          </div>
              @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
          <form
            action="{{ isset($test) ? route('tests.update', $test->id) : route('tests.store') }}"
            method="POST">
            @csrf
            @if(isset($test))
              @method('PUT')
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="job_post_id">Job Post</label>
                <select
                  class="form-control"
                  id="job_post_id"
                  name="job_post_id"
                  required>
                  <option value="" disabled {{ !isset($test) ? 'selected' : '' }}>Select a job post</option>
                  @foreach ($jobPosts as $jobPost)
                    <option
                      value="{{ $jobPost->id }}"
                      {{ old('job_post_id', $test->job_post_id ?? '') == $jobPost->id ? 'selected' : '' }}>
                      {{ $jobPost->title }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="test_date">Test Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="test_date"
                  name="test_date"
                  value="{{ old('test_date', $test->test_date ?? '') }}"
                  required>
              </div>
              <div class="form-group">
                <label for="test_time">Test Time</label>
                <input
                  type="time"
                  class="form-control"
                  id="test_time"
                  name="test_time"
                  value="{{ old('test_time', $test->test_time ?? '') }}"
                  required>
              </div>
              <div class="form-group">
                <label for="test_center">Test Center</label>
                <input
                  type="text"
                  class="form-control"
                  id="test_center"
                  name="test_center"
                  placeholder="Enter test center"
                  value="{{ old('test_center', $test->test_center ?? '') }}"
                  required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($test) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
