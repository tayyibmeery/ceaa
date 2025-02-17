@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($result) ? 'Edit Result' : 'Add Result' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('results.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($result) ? 'Edit Result' : 'Add Result' }}</li>
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
            <h3 class="card-title">{{ isset($result) ? 'Edit Result Details' : 'Add Result Details' }}</h3>
          </div>
          <form
            action="{{ isset($result) ? route('results.update', $result->id) : route('results.store') }}"
            method="POST">
            @csrf
            @if(isset($result))
              @method('PUT')
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="application_id">Application ID</label>
                <select
                  class="form-control"
                  id="application_id"
                  name="application_id"
                  required>
                  <option value="" disabled {{ !isset($result) ? 'selected' : '' }}>Select an Application</option>
                  @foreach ($applications as $application)
                    <option
                      value="{{ $application->id }}"
                      {{ old('application_id', $result->application_id ?? '') == $application->id ? 'selected' : '' }}>
                      {{ $application->id }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="marks_obtained">Marks Obtained</label>
                <input
                  type="number"
                  class="form-control"
                  id="marks_obtained"
                  name="marks_obtained"
                  placeholder="Enter marks obtained"
                  value="{{ old('marks_obtained', $result->marks_obtained ?? '') }}"
                  required>
              </div>
              <div class="form-group">
                <label for="total_marks">Total Marks</label>
                <input
                  type="number"
                  class="form-control"
                  id="total_marks"
                  name="total_marks"
                  placeholder="Enter total marks"
                  value="{{ old('total_marks', $result->total_marks ?? '') }}"
                  required>
              </div>
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea
                  class="form-control"
                  id="remarks"
                  name="remarks"
                  placeholder="Enter remarks">{{ old('remarks', $result->remarks ?? '') }}</textarea>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($result) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
