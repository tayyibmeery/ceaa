@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($application) ? 'Edit Application' : 'Add Application' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($application) ? 'Edit Application' : 'Add Application' }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
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
    </div>
      <div class="col-md-12">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              <small>{{ isset($application) ? 'Edit Application Details' : 'Add Application Details' }}</small>
            </h3>


          </div>
          <form
            action="{{ isset($application) ? route('applications.update', $application->id) : route('applications.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($application))
              @method('PUT')
            @endif
            <div class="card-body">
              <div class="row">
                <!-- Status -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                      <option value="applied" {{ old('status', $application->status ?? '') == 'applied' ? 'selected' : '' }}>Applied</option>
                      <option value="under_review" {{ old('status', $application->status ?? '') == 'under_review' ? 'selected' : '' }}>Under Review</option>
                      <option value="test_scheduled" {{ old('status', $application->status ?? '') == 'test_scheduled' ? 'selected' : '' }}>Test Scheduled</option>
                    </select>
                  </div>
                </div>
                <!-- Payment Status -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="payment_status">Payment Status</label>
                    <select class="form-control" id="payment_status" name="payment_status" required>
                      <option value="pending" {{ old('payment_status', $application->payment_status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                      <option value="paid" {{ old('payment_status', $application->payment_status ?? '') == 'paid' ? 'selected' : '' }}>Paid</option>
                      <option value="failed" {{ old('payment_status', $application->payment_status ?? '') == 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Reviewer Remarks -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="reviewer_remarks">Reviewer Remarks</label>
                    <textarea class="form-control" id="reviewer_remarks" name="reviewer_remarks"
                      rows="4">{{ old('reviewer_remarks', $application->reviewer_remarks ?? '') }}</textarea>
                  </div>
                </div>
                <!-- user -->
                <div class="col-md-6">
  <div class="form-group">
    <label for="user_name">Name</label>
    <!-- Display the user Name -->
    <input type="text" class="form-control" id="user_name" name="user_name"
      value="{{ old('user_name', $application->user->FullName ?? '') }}" readonly>
    <!-- Hidden Input to Send user ID -->
    <input type="hidden" id="user_id" name="user_id"
      value="{{ old('user_id', $application->user->id ?? '') }}">
  </div>
</div>

              </div>

              <div class="row">
                <!-- Job Post -->
                <div class="col-md-6">
  <div class="form-group">
    <label for="job_post_title">Job Post</label>
    <!-- Display the Job Post Title -->
    <input type="text" class="form-control" id="job_post_title" name="job_post_title"
      value="{{ old('job_post_title', $application->jobPost->title ?? '') }}" readonly>
    <!-- Hidden Input to Send Job Post ID -->
    <input type="hidden" id="job_post_id" name="job_post_id"
      value="{{ old('job_post_id', $application->jobPost->id ?? '') }}">
  </div>
</div>

                <!-- Resume -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="resume">Resume</label>
                    <input type="text" class="form-control" id="resume" name="resume"
                      value="{{ old('resume', $application->resume ?? '') }}" readonly>
                    @if(isset($application) && $application->resume)
                      <p class="mt-2">Current Resume: <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">View</a></p>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Cover Letter -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cover_letter">Cover Letter</label>
                    <input type="text" class="form-control" id="cover_letter" name="cover_letter"
                      value="{{ old('cover_letter', $application->cover_letter ?? '') }}" readonly>
                    @if(isset($application) && $application->cover_letter)
                      <p class="mt-2">Current Cover Letter: <a href="{{ asset('storage/' . $application->cover_letter) }}" target="_blank">View</a></p>
                    @endif
                  </div>
                </div>
                <!-- Highest Qualification -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="highest_qualification">Highest Qualification</label>
                    <input type="text" class="form-control" id="highest_qualification" name="highest_qualification"
                      value="{{ old('highest_qualification', $application->highest_qualification ?? '') }}" readonly>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Experience Years -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="experience_years">Experience Years</label>
                    <input type="number" class="form-control" id="experience_years" name="experience_years"
                      value="{{ old('experience_years', $application->experience_years ?? '') }}" readonly>
                  </div>
                </div>
                <!-- Fees Receipt -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fees_receipt">Fees Receipt</label>
                    <input type="text" class="form-control" id="fees_receipt" name="fees_receipt"
                      value="{{ old('fees_receipt', $application->fees_receipt ?? '') }}" readonly>
                    @if(isset($application) && $application->fees_receipt)
                      <p class="mt-2">Current Fees Receipt: <a href="{{ asset('storage/' . $application->fees_receipt) }}" target="_blank">View</a></p>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Submission Date -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="submission_date">Submission Date</label>
                    <input type="date" class="form-control" id="submission_date" name="submission_date"
                      value="{{ old('submission_date', $application->submission_date ?? '') }}" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($application) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
