@extends('frontend.layout.main')

@section('title', 'Search Roll Number Slip')

@section('content')

<section>
    <div class="container mt-5">
        <div class="heading-text heading-section text-center">
            <h4 class="text-blue">Search Roll Number Slip</h4>
        </div>

        <!-- Search Form -->
        <form action="{{ route('roll-number-slip.search') }}" method="POST">
            @csrf
            <div class="row">
                <h5>Enter the CNIC (Without dashes) then click on Search Button</h5>
                <div class="form-group col-6">
                    <label for="cnic-no">CNIC*</label>
                    <input type="text" class="form-control" min="0" max="11" id="cnic-no" name="cnic" placeholder="Enter CNIC without -" required>
                </div>
                <div class="form-group col-2">
                    <label for="search-label">Click to Search</label>
                    <button type="submit" id="get-applicant-list" class="btn btn-info">Search</button>
                </div>
            </div>
        </form>

        <!-- Display Roll Number Slip Details -->
        @if(isset($rollNumberSlip))
            <div class="mt-4">
                <h4 class="text-center">Roll Number Slip Details</h4>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Roll Number:</strong> {{ $rollNumberSlip->roll_number }}</li>
                    <li class="list-group-item"><strong>Serial Number:</strong> {{ $rollNumberSlip->serial_number }}</li>
                    <li class="list-group-item"><strong>Test Date:</strong> {{ $rollNumberSlip->test->test_date }}</li>
                    <li class="list-group-item"><strong>Test Time:</strong> {{ $rollNumberSlip->test->test_time }}</li>
                    <li class="list-group-item"><strong>Test Center:</strong> {{ $rollNumberSlip->test->test_center }}</li>
                </ul>
                <div class="text-center mt-3">
                    <a href="{{ route('roll-number-slip.download', $rollNumberSlip->id) }}" class="btn btn-success">Download Roll Number Slip</a>
                </div>
            </div>
        @endif

        <!-- Display Errors -->
        @if(session('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- No Data Found Message -->
        <div id="no-data-found" class="text-center mt-4" style="display: none;">
            <p>No roll number slip found for the entered CNIC.</p>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Optional: Add any JavaScript logic here if you need dynamic behavior like showing/hiding elements.
    // You can trigger the "no data found" message when the result is empty.
</script>
@endpush

@push('styles')
<!-- Optional: Add custom styles if needed -->
@endpush
