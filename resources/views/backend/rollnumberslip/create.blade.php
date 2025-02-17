@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($rollNumberSlip) ? 'Edit Roll Number Slip' : 'Add Roll Number Slip' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('roll-number-slips.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($rollNumberSlip) ? 'Edit Roll Number Slip' : 'Add Roll Number Slip' }}</li>
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
            <h3 class="card-title">{{ isset($rollNumberSlip) ? 'Edit Roll Number Slip Details' : 'Add Roll Number Slip Details' }}</h3>
          </div>
          <form
            action="{{ isset($rollNumberSlip) ? route('roll-number-slips.update', $rollNumberSlip->id) : route('roll-number-slips.store') }}"
            method="POST">
            @csrf
            @if(isset($rollNumberSlip))
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
                  <option value="" disabled {{ !isset($rollNumberSlip) ? 'selected' : '' }}>Select an Application</option>
                  @foreach ($applications as $application)
                    <option
                      value="{{ $application->id }}"
                      {{ old('application_id', $rollNumberSlip->application_id ?? '') == $application->id ? 'selected' : '' }}>
                      {{ $application->id }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="test_id">Test ID</label>
                <select
                  class="form-control"
                  id="test_id"
                  name="test_id"
                  required>
                  <option value="" disabled {{ !isset($rollNumberSlip) ? 'selected' : '' }}>Select a Test</option>
                  @foreach ($tests as $test)
                    <option
                      value="{{ $test->id }}"
                      {{ old('test_id', $rollNumberSlip->test_id ?? '') == $test->id ? 'selected' : '' }}>
                      {{ $test->id }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="roll_number">Roll Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="roll_number"
                  name="roll_number"
                  placeholder="Enter roll number"
                  value="{{ old('roll_number', $rollNumberSlip->roll_number ?? '') }}"
                  required>
              </div>
              <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="serial_number"
                  name="serial_number"
                  placeholder="Enter serial number"
                  value="{{ old('serial_number', $rollNumberSlip->serial_number ?? '') }}"
                  required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($rollNumberSlip) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
