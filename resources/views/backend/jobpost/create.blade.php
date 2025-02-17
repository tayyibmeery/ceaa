@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($jobPost) ? 'Edit Job Post' : 'Create Job Post' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('job-posts.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($jobPost) ? 'Edit Job Post' : 'Create Job Post' }}</li>
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
            <h3 class="card-title"><small>{{ isset($jobPost) ? 'Edit Job Post' : 'Create Job Post' }}</small></h3>
          </div>
          <form
            action="{{ isset($jobPost) ? route('job-posts.update', $jobPost->id) : route('job-posts.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($jobPost))
              @method('PUT')
            @endif
            <div class="card-body">
              <!-- Job Title and Organization Name in One Row -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title">Job Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter job title"
                      value="{{ old('title', $jobPost->title ?? '') }}" required>
                    @error('title')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="organization_name">Organization Name</label>
                    <input type="text" class="form-control @error('organization_name') is-invalid @enderror" id="organization_name" name="organization_name" placeholder="Enter job organization Name"
                      value="{{ old('organization_name', $jobPost->organization_name ?? '') }}" required>
                    @error('organization_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Job Description -->
              <div class="form-group">
                <label for="description">Job Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4"
                  placeholder="Enter job description" required>{{ old('description', $jobPost->description ?? '') }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Job Requirements -->
              <div class="form-group">
                <label for="requirements">Requirements</label>
                <textarea class="form-control @error('requirements') is-invalid @enderror" id="requirements" name="requirements" rows="4"
                  placeholder="Enter job requirements">{{ old('requirements', $jobPost->requirements ?? '') }}</textarea>
                @error('requirements')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Advertisement Date and Application Deadline in One Row -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="advertisement_date">Advertisement Date</label>
                    <input type="date" class="form-control @error('advertisement_date') is-invalid @enderror" id="advertisement_date" name="advertisement_date"
                      value="{{ old('advertisement_date', $jobPost->advertisement_date ?? '') }}" required>
                    @error('advertisement_date')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="application_deadline">Application Deadline</label>
                    <input type="date" class="form-control @error('application_deadline') is-invalid @enderror" id="application_deadline" name="application_deadline"
                      value="{{ old('application_deadline', $jobPost->application_deadline ?? '') }}" required>
                    @error('application_deadline')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Advertisement File -->
              <div class="form-group">
                <label for="advertisement_file">Advertisement File</label>
                <input type="file" class="form-control @error('advertisement_file') is-invalid @enderror" id="advertisement_file" name="advertisement_file"
                  accept="application/pdf,image/*">
                @if(isset($jobPost) && $jobPost->advertisement_file)
                  <p>Current File: <a href="{{ asset('storage/' . $jobPost->advertisement_file) }}" target="_blank">View</a></p>
                @endif
                @error('advertisement_file')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Status and Visibility in One Row -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                      <option value="active" {{ old('status', $jobPost->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                      <option value="inactive" {{ old('status', $jobPost->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                      <option value="expired" {{ old('status', $jobPost->status ?? '') == 'expired' ? 'selected' : '' }}>Expired</option>
                    </select>
                    @error('status')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="is_visible" name="is_visible"
                        {{ old('is_visible', $jobPost->is_visible ?? true) ? 'checked' : '' }}>
                      <label class="form-check-label" for="is_visible">Visible</label>
                    </div>
                    @error('is_visible')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($jobPost) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
